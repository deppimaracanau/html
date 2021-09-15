<?php

/**
 * TODO: mover para forms do admin
 */
class Application_Form_Horarios extends Zend_Form {

    private $descricao;

    const HORA_INI = 'hora_inicio';
    const HORA_FIM = 'hora_fim';

    /**
     * @return the $descricao
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * @param field_type $descricao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function init() {

    }

    public function cria() {
        $this->setMethod("post");

        $descricao = $this->createElement('text', 'descricao', array('label' => 'Descrição: '));
        $descricao->setValue($this->getDescricao())
                ->setAttrib('placeholder', 'Turma 1 ou Parte 1...');

        $model_sala = new Application_Model_Sala();
        $salas = $model_sala->fetchAll(null, "nome_sala ASC");

        $salasForm = $this->createElement('select', 'id_sala', array(
            'label' => '* Sala: '
        ))->setAttrib('class', 'select2');

        foreach ($salas as $sala) {
            $salasForm->addMultiOptions(array($sala->id_sala => $sala->nome_sala));
        }

        $this->addElement($descricao)
                ->addElement($salasForm)
                ->addElement($this->_data())
                ->addElement($this->_hora(self::HORA_INI, '* Horário de início:'))
                ->addElement($this->_hora(self::HORA_FIM, '* Horário de término:'));

        $btn_confirmar = $this->createElement('submit', 'confimar')->removeDecorator('DtDdWrapper');
        $this->addElement($btn_confirmar);
        $btn_cancelar = $this->createElement('reset', 'cancelar')->removeDecorator('DtDdWrapper');
        $this->addElement($btn_cancelar);
    }

    private function _data() {
        $model = new Application_Model_Encontro();
//		$sessao = Zend_Auth::getInstance()->getIdentity();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $idEncontro = (int) $ps->encontro["id_encontro"];
        $where = $model->getAdapter()->quoteInto('id_encontro = ?', $idEncontro);
        $sql = "select data_inicio, data_fim from encontro where id_encontro=?";
        $row = $model->getAdapter()->fetchRow($sql, array($idEncontro));
        	
        $element = $this->createElement('radio', 'data', array('label' => '* Data: '));
        $data_ini = new Zend_Date($row['data_inicio'], 'YYYY-MM-dd');
        $data_fim = new Zend_Date($row['data_fim'], 'YYYY-MM-dd');
        while ($data_ini <= $data_fim) {
            $element->addMultiOption($data_ini->toString('dd/MM/YYYY'), $data_ini->toString('dd/MM/YYYY'));
            $data_ini->add(1, Zend_Date::DAY);
        }
        $element->setRequired(true)->addErrorMessage("Escolha uma data para realização do evento.");
        return $element;
    }

    private function _hora($id, $label) {
        $element = new Zend_Form_Element_Select($id);
        $element->setRequired(true)
                ->setLabel($label)
                ->setAttrib('class', 'select2');

        $model = new Admin_Model_Encontro();
        $cache = Zend_Registry::get('cache_common');
        $ps = $cache->load('prefsis');
        $id_encontro = (int) $ps->encontro["id_encontro"];
        $sql = "SELECT intervalo_minutos, horario_inicial, horario_final
            FROM encontro e
            INNER JOIN tipo_horario th ON e.id_tipo_horario = th.id_tipo_horario
            WHERE e.id_encontro = ?";
        $rs = $model->getAdapter()->fetchRow($sql, array($id_encontro));

        $intervalo = $rs['intervalo_minutos'];
        $hora_min = new Zend_Date($rs['horario_inicial'], 'HH:mm');
        $hora_aux = clone $hora_min;
        $hora_max = new Zend_Date($rs['horario_final'], 'HH:mm');
        while ($hora_aux <= $hora_max) {
            if (self::HORA_INI == $id and $hora_aux == $hora_max) {
                $hora_aux->add($intervalo, Zend_Date::MINUTE_SHORT);
                continue;
            } else if (self::HORA_FIM == $id and $hora_aux == $hora_min) {
                $hora_aux->add($intervalo, Zend_Date::MINUTE_SHORT);
                continue;
            }
            $element->addMultiOption($hora_aux->toString('HH:mm'), $hora_aux->toString('HH:mm'));
            $hora_aux->add($intervalo, Zend_Date::MINUTE_SHORT);
        }
        return $element;
    }

}
