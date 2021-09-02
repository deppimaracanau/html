<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Inscreva-se no Webinar</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">

        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img class="booking-img" src="images/lp01.png" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form id="booking-form" action="php/database.php" method="POST">
                        <h2>Preencha o formulário e saiba mais sobre como ter uma empresa forte e saúdavel!</h2>
                        <div class="form-group form-input">
                            <input type="text" name="name" id="name" value="" required/>
                            <label for="name" class="form-label">Nome *</label>
                        </div>

                        <div class="form-group form-input">
                            <input type="text" name="email" id="email" value="" required/>
                            <label for="email" class="form-label">E-mail *</label>
                        </div>
                        <?php if(!empty($erro)) { echo $erro; } ?>
                        <div class="select-list">
                            <label for="cargo" class="form-input">Qual o seu Cargo? *</label>
                            <select name="cargo" id="cargo" required>
                                <option value="" disabled selected hidden>Selecione um item...</option>
                                <option value="scp">Sócio / CEO / Propietário</option>
                                <option value="dir">Diretor</option>
                                <option value="ger">Gerente</option>
                                <option value="coo">Coordenador / Supervisor</option>
                                <option value="ana">Analista / Assistente</option>
                                <option value="est">Estudante</option>
                                <option value="out">Outros Cargos</option>
                            </select>
                        </div>

                        
                        <!--<div class="form-group form-input">
                            <input type="text" name="cargo" id="cargo" value="" required/>
                            <label for="name" class="form-label">Cargo</label>
                        </div>-->

                       
                                <div class="select-list">
                                    <label for="empresa" class="form-input">Você já tem empresa formalizada? *</label>
                                     <select name="empresa" id="empresa" required>
                                        <option value="" disabled selected hidden>Selecione um item...</option>
                                        <option value="sim">Sim</option>
                                        <option value="nao">Não</option>
                                        <option value="est">Estou abrindo um negócio</option>
                                        <option value="naop">Não possuo empresa</option>
                                    </select>
                                </div>
                        

                        <!--<div class="form-group">
                            <div class="select-list">
                                <select name="formalizada" id="formalizada" required>
                                    <option value="">Você já tem empresa formalizada?</option>
                                    <option value="">Sim</option>
                                    <option value="">Não</option>
                                </select>
                            </div>
                        </div>-->

                        
                                <div class="select-list">
                                    <label for="empresa" class="form-input">Qual o segmento da sua empresa? *</label>
                                    <select name="segmento" id="segmento" required>
                                        <option value="" disabled selected hidden>Selecione um item...</option>
                                        <option value="coma">Comércio Atacadista (Vende Somente Produtos)</option>
                                        <option value="comv">Comércio Varejista (Vende Somente Produtos)</option>
                                        <option value="ind">Indústria (Fábrica)</option>
                                        <option value="comserv">Comércio e Serviço (Vende produtos e presta serviço)</option>
                                        <option value="naop">Não possuo empresa</option>
                                    </select>
                                </div>
                        
                    

                        <!--<div class="form-group">
                            <div class="select-list">
                                <select name="segmento" id="segmento" required>
                                    <option value="">Qual o segmento da sua empresa?</option>
                                    <option value="varejo">Varejo</option>
                                    <option value="atacado">Atacado</option>
                                    <option value="comercioLocal">Comercio Local</option>
                                </select>
                            </div>
                        </div>-->
                        

                        
                                <div class="select-list">
                                    <label for="empresa" class="form-input">Quantas pessoas tem na sua empresa? *</label>
                                    <select name="pessoas" id="pessoas" required>
                                        <option value="" disabled selected hidden>Selecione um item...</option>
                                        <option value="micro">1 à 10</option>
                                        <option value="pequena">11 à 50</option>
                                        <option value="media">51 ou mais</option>
                                        <option value="naop">Não possuo empresa</option>
                                    </select>
                                </div>
                        

                        <div class="g-recaptcha" data-sitekey="6LeH3NcUAAAAADy8Wgd4uuf-2eGEyEVo1jMymbq4"></div>
                    

                        <div class="form-submit">
                            <input type="submit" value="Inscreva-se no Webinar" class="submit" id="submit" name="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

        <!--<?php 
    foreach ($_POST as $key => $value) {
        echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
    }
    ?>-->

    <!-- JS -->
    <!--<script src='https://www.google.com/recaptcha/api.js?hl=es'></script>-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>