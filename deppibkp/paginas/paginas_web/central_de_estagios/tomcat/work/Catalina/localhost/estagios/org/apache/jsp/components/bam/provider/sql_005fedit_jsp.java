/*
 * Generated by the Jasper component of Apache Tomcat
 * Version: Apache Tomcat/7.0.79
 * Generated at: 2017-11-13 16:23:33 UTC
 * Note: The last modified time of this file was set to
 *       the last modified time of the source file after
 *       generation to assist with modification tracking.
 */
package org.apache.jsp.components.bam.provider;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import org.jboss.dashboard.ui.components.sql.SQLProviderEditor;
import org.jboss.dashboard.database.DataSourceManager;
import java.util.List;
import java.util.ListIterator;
import org.jboss.dashboard.LocaleManager;
import org.jboss.dashboard.provider.sql.SQLDataLoader;
import org.jboss.dashboard.CoreServices;
import org.jboss.dashboard.ui.UIBeanLocator;

public final class sql_005fedit_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final javax.servlet.jsp.JspFactory _jspxFactory =
          javax.servlet.jsp.JspFactory.getDefaultFactory();

  private static java.util.Map<java.lang.String,java.lang.Long> _jspx_dependants;

  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fid_005fbaseName_005fnobody;
  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005fpanel_005fdefineObjects_005fnobody;
  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey;
  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody;
  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005ffactory_005fencode_0026_005fname_005fnobody;
  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005ffactory_005fbean_0026_005fproperty_005fbean_005fnobody;

  private volatile javax.el.ExpressionFactory _el_expressionfactory;
  private volatile org.apache.tomcat.InstanceManager _jsp_instancemanager;

  public java.util.Map<java.lang.String,java.lang.Long> getDependants() {
    return _jspx_dependants;
  }

  public javax.el.ExpressionFactory _jsp_getExpressionFactory() {
    if (_el_expressionfactory == null) {
      synchronized (this) {
        if (_el_expressionfactory == null) {
          _el_expressionfactory = _jspxFactory.getJspApplicationContext(getServletConfig().getServletContext()).getExpressionFactory();
        }
      }
    }
    return _el_expressionfactory;
  }

  public org.apache.tomcat.InstanceManager _jsp_getInstanceManager() {
    if (_jsp_instancemanager == null) {
      synchronized (this) {
        if (_jsp_instancemanager == null) {
          _jsp_instancemanager = org.apache.jasper.runtime.InstanceManagerFactory.getInstanceManager(getServletConfig());
        }
      }
    }
    return _jsp_instancemanager;
  }

  public void _jspInit() {
    _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fid_005fbaseName_005fnobody = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
    _005fjspx_005ftagPool_005fpanel_005fdefineObjects_005fnobody = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
    _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
    _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
    _005fjspx_005ftagPool_005ffactory_005fencode_0026_005fname_005fnobody = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
    _005fjspx_005ftagPool_005ffactory_005fbean_0026_005fproperty_005fbean_005fnobody = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
  }

  public void _jspDestroy() {
    _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fid_005fbaseName_005fnobody.release();
    _005fjspx_005ftagPool_005fpanel_005fdefineObjects_005fnobody.release();
    _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey.release();
    _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.release();
    _005fjspx_005ftagPool_005ffactory_005fencode_0026_005fname_005fnobody.release();
    _005fjspx_005ftagPool_005ffactory_005fbean_0026_005fproperty_005fbean_005fnobody.release();
  }

  public void _jspService(final javax.servlet.http.HttpServletRequest request, final javax.servlet.http.HttpServletResponse response)
        throws java.io.IOException, javax.servlet.ServletException {

    final javax.servlet.jsp.PageContext pageContext;
    javax.servlet.http.HttpSession session = null;
    final javax.servlet.ServletContext application;
    final javax.servlet.ServletConfig config;
    javax.servlet.jsp.JspWriter out = null;
    final java.lang.Object page = this;
    javax.servlet.jsp.JspWriter _jspx_out = null;
    javax.servlet.jsp.PageContext _jspx_page_context = null;


    try {
      response.setContentType("text/html");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;

      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      //  i18n:bundle
      java.util.ResourceBundle bundle = null;
      org.jboss.dashboard.ui.taglib.BundleTag _jspx_th_i18n_005fbundle_005f0 = (org.jboss.dashboard.ui.taglib.BundleTag) _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fid_005fbaseName_005fnobody.get(org.jboss.dashboard.ui.taglib.BundleTag.class);
      boolean _jspx_th_i18n_005fbundle_005f0_reused = false;
      try {
        _jspx_th_i18n_005fbundle_005f0.setPageContext(_jspx_page_context);
        _jspx_th_i18n_005fbundle_005f0.setParent(null);
        // /components/bam/provider/sql_edit.jsp(30,0) name = id type = null reqTime = true required = false fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
        _jspx_th_i18n_005fbundle_005f0.setId("bundle");
        // /components/bam/provider/sql_edit.jsp(30,0) name = baseName type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
        _jspx_th_i18n_005fbundle_005f0.setBaseName("org.jboss.dashboard.ui.components.sql.messages");
        // /components/bam/provider/sql_edit.jsp(30,0) name = locale type = null reqTime = true required = false fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
        _jspx_th_i18n_005fbundle_005f0.setLocale(LocaleManager.currentLocale());
        int _jspx_eval_i18n_005fbundle_005f0 = _jspx_th_i18n_005fbundle_005f0.doStartTag();
        if (_jspx_th_i18n_005fbundle_005f0.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
          return;
        }
        bundle = (java.util.ResourceBundle) _jspx_page_context.findAttribute("bundle");
        _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fid_005fbaseName_005fnobody.reuse(_jspx_th_i18n_005fbundle_005f0);
        _jspx_th_i18n_005fbundle_005f0_reused = true;
      } finally {
        org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fbundle_005f0, _jsp_getInstanceManager(), _jspx_th_i18n_005fbundle_005f0_reused);
      }
      out.write('\n');
      //  panel:defineObjects
      org.jboss.dashboard.workspace.Section currentSection = null;
      org.jboss.dashboard.workspace.WorkspaceImpl currentWorkspace = null;
      java.lang.String currentPanelId = null;
      org.jboss.dashboard.workspace.Panel currentPanel = null;
      org.jboss.dashboard.workspace.PanelSession panelSession = null;
      org.jboss.dashboard.ui.panel.PanelProvider panelProvider = null;
      org.jboss.dashboard.ui.panel.PanelDriver panelDriver = null;
      java.util.Locale currentLocale = null;
      java.lang.Boolean isAdminMode = null;
      org.jboss.dashboard.ui.taglib.DefineObjectsTag _jspx_th_panel_005fdefineObjects_005f0 = (org.jboss.dashboard.ui.taglib.DefineObjectsTag) _005fjspx_005ftagPool_005fpanel_005fdefineObjects_005fnobody.get(org.jboss.dashboard.ui.taglib.DefineObjectsTag.class);
      boolean _jspx_th_panel_005fdefineObjects_005f0_reused = false;
      try {
        _jspx_th_panel_005fdefineObjects_005f0.setPageContext(_jspx_page_context);
        _jspx_th_panel_005fdefineObjects_005f0.setParent(null);
        int _jspx_eval_panel_005fdefineObjects_005f0 = _jspx_th_panel_005fdefineObjects_005f0.doStartTag();
        if (_jspx_th_panel_005fdefineObjects_005f0.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
          return;
        }
        currentSection = (org.jboss.dashboard.workspace.Section) _jspx_page_context.findAttribute("currentSection");
        currentWorkspace = (org.jboss.dashboard.workspace.WorkspaceImpl) _jspx_page_context.findAttribute("currentWorkspace");
        currentPanelId = (java.lang.String) _jspx_page_context.findAttribute("currentPanelId");
        currentPanel = (org.jboss.dashboard.workspace.Panel) _jspx_page_context.findAttribute("currentPanel");
        panelSession = (org.jboss.dashboard.workspace.PanelSession) _jspx_page_context.findAttribute("panelSession");
        panelProvider = (org.jboss.dashboard.ui.panel.PanelProvider) _jspx_page_context.findAttribute("panelProvider");
        panelDriver = (org.jboss.dashboard.ui.panel.PanelDriver) _jspx_page_context.findAttribute("panelDriver");
        currentLocale = (java.util.Locale) _jspx_page_context.findAttribute("currentLocale");
        isAdminMode = (java.lang.Boolean) _jspx_page_context.findAttribute("isAdminMode");
        _005fjspx_005ftagPool_005fpanel_005fdefineObjects_005fnobody.reuse(_jspx_th_panel_005fdefineObjects_005f0);
        _jspx_th_panel_005fdefineObjects_005f0_reused = true;
      } finally {
        org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_panel_005fdefineObjects_005f0, _jsp_getInstanceManager(), _jspx_th_panel_005fdefineObjects_005f0_reused);
      }
      out.write('\n');

    // Get the data provider from the data provider viewer and save it in the sql provider editor if it's necessary
    SQLProviderEditor editor = (SQLProviderEditor) UIBeanLocator.lookup().getCurrentBean(request);

    // Get the dataSource and the query
    SQLDataLoader sqlLoader = editor.getSQLDataLoader();
    String currentDataSource = sqlLoader.getDataSource();
    String sqlQuery = sqlLoader.getSQLQuery();

      out.write("\n");
      out.write("\n");
      out.write("<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n");
      out.write("    <tr>\n");
      out.write("        <td align=\"left\" style=\"padding-left:20px; padding-right:20px;\">\n");
      out.write("            ");
      if (_jspx_meth_i18n_005fmessage_005f0(_jspx_page_context))
        return;
      out.write(": &nbsp;\n");
      out.write("            <select name=\"dataSource\" title=\"");
      out.print( currentDataSource );
      out.write("\" width=\"65px\" class=\"skn-input\">\n");
      out.write("            ");

                DataSourceManager dataSourceManager = CoreServices.lookup().getDataSourceManager();
                List dataSourcesList = dataSourceManager.getDataSourceNames();
                ListIterator dataSourcesListIterator = dataSourcesList.listIterator();
                while (dataSourcesListIterator.hasNext()) {
                    String selected = "";
                    String dataSource = (String) dataSourcesListIterator.next();
                    if (dataSource.equals(currentDataSource)) selected = "selected";
            
      out.write("\n");
      out.write("                    <option title=\"");
      out.print( dataSource );
      out.write("\" value=\"");
      out.print( dataSource );
      out.write('"');
      out.write(' ');
      out.print( selected );
      out.write('>');
      out.print( dataSource );
      out.write("</option>\n");
      out.write("            ");

                }
            
      out.write("\n");
      out.write("            </select>\n");
      out.write("        </td>\n");
      out.write("    </tr>\n");
      out.write("    <tr>\n");
      out.write("        <td align=\"left\"  style=\"padding-top:8px; padding-bottom:8px;padding-left:20px; padding-right:20px;\">");
      if (_jspx_meth_i18n_005fmessage_005f1(_jspx_page_context))
        return;
      out.write(": <br/>\n");
      out.write("        <textarea name=\"sqlQuery\" rows=\"10\" cols=\"90\" style=\"width:100%;\">");
      out.print( sqlQuery == null ? "" : sqlQuery );
      out.write("</textarea>\n");
      out.write("\t\t<input id=\"");
      if (_jspx_meth_factory_005fencode_005f0(_jspx_page_context))
        return;
      out.write("\" type=\"hidden\" value=\"false\" name=\"");
      if (_jspx_meth_factory_005fbean_005f0(_jspx_page_context))
        return;
      out.write("\"/>\n");

    // Check if the result of the test has been correct or not.
    if (editor.isConfiguredOk()) {

      out.write("\n");
      out.write("            <br>\n");
      out.write("            <font color=green>\n");
      out.write("                ");
 if (editor.getElapsedTime() > 0) { 
      out.write("\n");
      out.write("\t\t\t\t\t");
      if (_jspx_meth_i18n_005fmessage_005f2(_jspx_page_context))
        return;
      out.write("\n");
      out.write("\t\t\t\t\t<br>\n");
      out.write("                    ");
      if (_jspx_meth_i18n_005fmessage_005f3(_jspx_page_context))
        return;
      out.write(':');
      out.write(' ');
      out.print(editor.getElapsedTime());
      out.write(" ms\n");
      out.write("                    <br>\n");
      out.write("                    ");
      if (_jspx_meth_i18n_005fmessage_005f4(_jspx_page_context))
        return;
      out.write(':');
      out.write(' ');
      out.print(editor.getNrows());
      out.write("\n");
      out.write("                ");
 } 
      out.write("\n");
      out.write("            </font>\n");

    }

      out.write("\n");
      out.write("        </td>\n");
      out.write("   </tr>\n");
      out.write("   <tr>\n");
      out.write("        <td align=\"center\">\n");
      out.write("            <label>\n");
      out.write("                <input class=\"skn-button\" type=\"button\" value=\"");
      if (_jspx_meth_i18n_005fmessage_005f5(_jspx_page_context))
        return;
      out.write("\" onclick=\"document.getElementById('");
      if (_jspx_meth_factory_005fencode_005f1(_jspx_page_context))
        return;
      out.write("').value='true';\n");
      out.write("\t\t\t\t\tsubmitAjaxForm(this.form);\"/>\n");
      out.write("            </label>\n");
      out.write("        </td>\n");
      out.write("    </tr>\n");
      out.write("</table>\n");
    } catch (java.lang.Throwable t) {
      if (!(t instanceof javax.servlet.jsp.SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          try {
            if (response.isCommitted()) {
              out.flush();
            } else {
              out.clearBuffer();
            }
          } catch (java.io.IOException e) {}
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }

  private boolean _jspx_meth_i18n_005fmessage_005f0(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  i18n:message
    org.jboss.dashboard.ui.taglib.MessageTag _jspx_th_i18n_005fmessage_005f0 = (org.jboss.dashboard.ui.taglib.MessageTag) _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey.get(org.jboss.dashboard.ui.taglib.MessageTag.class);
    boolean _jspx_th_i18n_005fmessage_005f0_reused = false;
    try {
      _jspx_th_i18n_005fmessage_005f0.setPageContext(_jspx_page_context);
      _jspx_th_i18n_005fmessage_005f0.setParent(null);
      // /components/bam/provider/sql_edit.jsp(45,12) name = key type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_i18n_005fmessage_005f0.setKey("editor.sql.datasourceToUse");
      int _jspx_eval_i18n_005fmessage_005f0 = _jspx_th_i18n_005fmessage_005f0.doStartTag();
      if (_jspx_eval_i18n_005fmessage_005f0 != javax.servlet.jsp.tagext.Tag.SKIP_BODY) {
        if (_jspx_eval_i18n_005fmessage_005f0 != javax.servlet.jsp.tagext.Tag.EVAL_BODY_INCLUDE) {
          out = org.apache.jasper.runtime.JspRuntimeLibrary.startBufferedBody(_jspx_page_context, _jspx_th_i18n_005fmessage_005f0);
        }
        do {
          out.write("!!!Datasource a utilizar");
          int evalDoAfterBody = _jspx_th_i18n_005fmessage_005f0.doAfterBody();
          if (evalDoAfterBody != javax.servlet.jsp.tagext.BodyTag.EVAL_BODY_AGAIN)
            break;
        } while (true);
        if (_jspx_eval_i18n_005fmessage_005f0 != javax.servlet.jsp.tagext.Tag.EVAL_BODY_INCLUDE) {
          out = _jspx_page_context.popBody();
        }
      }
      if (_jspx_th_i18n_005fmessage_005f0.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey.reuse(_jspx_th_i18n_005fmessage_005f0);
      _jspx_th_i18n_005fmessage_005f0_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fmessage_005f0, _jsp_getInstanceManager(), _jspx_th_i18n_005fmessage_005f0_reused);
    }
    return false;
  }

  private boolean _jspx_meth_i18n_005fmessage_005f1(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  i18n:message
    org.jboss.dashboard.ui.taglib.MessageTag _jspx_th_i18n_005fmessage_005f1 = (org.jboss.dashboard.ui.taglib.MessageTag) _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.get(org.jboss.dashboard.ui.taglib.MessageTag.class);
    boolean _jspx_th_i18n_005fmessage_005f1_reused = false;
    try {
      _jspx_th_i18n_005fmessage_005f1.setPageContext(_jspx_page_context);
      _jspx_th_i18n_005fmessage_005f1.setParent(null);
      // /components/bam/provider/sql_edit.jsp(64,109) name = key type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_i18n_005fmessage_005f1.setKey("editor.sql.query");
      int _jspx_eval_i18n_005fmessage_005f1 = _jspx_th_i18n_005fmessage_005f1.doStartTag();
      if (_jspx_th_i18n_005fmessage_005f1.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.reuse(_jspx_th_i18n_005fmessage_005f1);
      _jspx_th_i18n_005fmessage_005f1_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fmessage_005f1, _jsp_getInstanceManager(), _jspx_th_i18n_005fmessage_005f1_reused);
    }
    return false;
  }

  private boolean _jspx_meth_factory_005fencode_005f0(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  factory:encode
    org.jboss.dashboard.ui.taglib.factory.EncodeTag _jspx_th_factory_005fencode_005f0 = (org.jboss.dashboard.ui.taglib.factory.EncodeTag) _005fjspx_005ftagPool_005ffactory_005fencode_0026_005fname_005fnobody.get(org.jboss.dashboard.ui.taglib.factory.EncodeTag.class);
    boolean _jspx_th_factory_005fencode_005f0_reused = false;
    try {
      _jspx_th_factory_005fencode_005f0.setPageContext(_jspx_page_context);
      _jspx_th_factory_005fencode_005f0.setParent(null);
      // /components/bam/provider/sql_edit.jsp(66,13) name = name type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_factory_005fencode_005f0.setName("testProviderConfigPressed");
      int _jspx_eval_factory_005fencode_005f0 = _jspx_th_factory_005fencode_005f0.doStartTag();
      if (_jspx_th_factory_005fencode_005f0.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005ffactory_005fencode_0026_005fname_005fnobody.reuse(_jspx_th_factory_005fencode_005f0);
      _jspx_th_factory_005fencode_005f0_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_factory_005fencode_005f0, _jsp_getInstanceManager(), _jspx_th_factory_005fencode_005f0_reused);
    }
    return false;
  }

  private boolean _jspx_meth_factory_005fbean_005f0(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  factory:bean
    org.jboss.dashboard.ui.taglib.factory.BeanTag _jspx_th_factory_005fbean_005f0 = (org.jboss.dashboard.ui.taglib.factory.BeanTag) _005fjspx_005ftagPool_005ffactory_005fbean_0026_005fproperty_005fbean_005fnobody.get(org.jboss.dashboard.ui.taglib.factory.BeanTag.class);
    boolean _jspx_th_factory_005fbean_005f0_reused = false;
    try {
      _jspx_th_factory_005fbean_005f0.setPageContext(_jspx_page_context);
      _jspx_th_factory_005fbean_005f0.setParent(null);
      // /components/bam/provider/sql_edit.jsp(66,99) name = property type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_factory_005fbean_005f0.setProperty("testConfigButtonPressed");
      // /components/bam/provider/sql_edit.jsp(66,99) name = bean type = null reqTime = true required = false fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_factory_005fbean_005f0.setBean("org.jboss.dashboard.ui.components.DataProviderHandler");
      int _jspx_eval_factory_005fbean_005f0 = _jspx_th_factory_005fbean_005f0.doStartTag();
      if (_jspx_th_factory_005fbean_005f0.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005ffactory_005fbean_0026_005fproperty_005fbean_005fnobody.reuse(_jspx_th_factory_005fbean_005f0);
      _jspx_th_factory_005fbean_005f0_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_factory_005fbean_005f0, _jsp_getInstanceManager(), _jspx_th_factory_005fbean_005f0_reused);
    }
    return false;
  }

  private boolean _jspx_meth_i18n_005fmessage_005f2(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  i18n:message
    org.jboss.dashboard.ui.taglib.MessageTag _jspx_th_i18n_005fmessage_005f2 = (org.jboss.dashboard.ui.taglib.MessageTag) _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey.get(org.jboss.dashboard.ui.taglib.MessageTag.class);
    boolean _jspx_th_i18n_005fmessage_005f2_reused = false;
    try {
      _jspx_th_i18n_005fmessage_005f2.setPageContext(_jspx_page_context);
      _jspx_th_i18n_005fmessage_005f2.setParent(null);
      // /components/bam/provider/sql_edit.jsp(74,5) name = key type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_i18n_005fmessage_005f2.setKey("editor.sql.dataSetOk");
      int _jspx_eval_i18n_005fmessage_005f2 = _jspx_th_i18n_005fmessage_005f2.doStartTag();
      if (_jspx_eval_i18n_005fmessage_005f2 != javax.servlet.jsp.tagext.Tag.SKIP_BODY) {
        if (_jspx_eval_i18n_005fmessage_005f2 != javax.servlet.jsp.tagext.Tag.EVAL_BODY_INCLUDE) {
          out = org.apache.jasper.runtime.JspRuntimeLibrary.startBufferedBody(_jspx_page_context, _jspx_th_i18n_005fmessage_005f2);
        }
        do {
          out.write("!!!Conjunto de datos correcto");
          int evalDoAfterBody = _jspx_th_i18n_005fmessage_005f2.doAfterBody();
          if (evalDoAfterBody != javax.servlet.jsp.tagext.BodyTag.EVAL_BODY_AGAIN)
            break;
        } while (true);
        if (_jspx_eval_i18n_005fmessage_005f2 != javax.servlet.jsp.tagext.Tag.EVAL_BODY_INCLUDE) {
          out = _jspx_page_context.popBody();
        }
      }
      if (_jspx_th_i18n_005fmessage_005f2.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey.reuse(_jspx_th_i18n_005fmessage_005f2);
      _jspx_th_i18n_005fmessage_005f2_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fmessage_005f2, _jsp_getInstanceManager(), _jspx_th_i18n_005fmessage_005f2_reused);
    }
    return false;
  }

  private boolean _jspx_meth_i18n_005fmessage_005f3(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  i18n:message
    org.jboss.dashboard.ui.taglib.MessageTag _jspx_th_i18n_005fmessage_005f3 = (org.jboss.dashboard.ui.taglib.MessageTag) _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.get(org.jboss.dashboard.ui.taglib.MessageTag.class);
    boolean _jspx_th_i18n_005fmessage_005f3_reused = false;
    try {
      _jspx_th_i18n_005fmessage_005f3.setPageContext(_jspx_page_context);
      _jspx_th_i18n_005fmessage_005f3.setParent(null);
      // /components/bam/provider/sql_edit.jsp(76,20) name = key type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_i18n_005fmessage_005f3.setKey("editor.sql.elapsedTime");
      int _jspx_eval_i18n_005fmessage_005f3 = _jspx_th_i18n_005fmessage_005f3.doStartTag();
      if (_jspx_th_i18n_005fmessage_005f3.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.reuse(_jspx_th_i18n_005fmessage_005f3);
      _jspx_th_i18n_005fmessage_005f3_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fmessage_005f3, _jsp_getInstanceManager(), _jspx_th_i18n_005fmessage_005f3_reused);
    }
    return false;
  }

  private boolean _jspx_meth_i18n_005fmessage_005f4(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  i18n:message
    org.jboss.dashboard.ui.taglib.MessageTag _jspx_th_i18n_005fmessage_005f4 = (org.jboss.dashboard.ui.taglib.MessageTag) _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.get(org.jboss.dashboard.ui.taglib.MessageTag.class);
    boolean _jspx_th_i18n_005fmessage_005f4_reused = false;
    try {
      _jspx_th_i18n_005fmessage_005f4.setPageContext(_jspx_page_context);
      _jspx_th_i18n_005fmessage_005f4.setParent(null);
      // /components/bam/provider/sql_edit.jsp(78,20) name = key type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_i18n_005fmessage_005f4.setKey("editor.sql.numberOfResults");
      int _jspx_eval_i18n_005fmessage_005f4 = _jspx_th_i18n_005fmessage_005f4.doStartTag();
      if (_jspx_th_i18n_005fmessage_005f4.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.reuse(_jspx_th_i18n_005fmessage_005f4);
      _jspx_th_i18n_005fmessage_005f4_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fmessage_005f4, _jsp_getInstanceManager(), _jspx_th_i18n_005fmessage_005f4_reused);
    }
    return false;
  }

  private boolean _jspx_meth_i18n_005fmessage_005f5(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  i18n:message
    org.jboss.dashboard.ui.taglib.MessageTag _jspx_th_i18n_005fmessage_005f5 = (org.jboss.dashboard.ui.taglib.MessageTag) _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.get(org.jboss.dashboard.ui.taglib.MessageTag.class);
    boolean _jspx_th_i18n_005fmessage_005f5_reused = false;
    try {
      _jspx_th_i18n_005fmessage_005f5.setPageContext(_jspx_page_context);
      _jspx_th_i18n_005fmessage_005f5.setParent(null);
      // /components/bam/provider/sql_edit.jsp(89,63) name = key type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_i18n_005fmessage_005f5.setKey("editor.sql.tryButton");
      int _jspx_eval_i18n_005fmessage_005f5 = _jspx_th_i18n_005fmessage_005f5.doStartTag();
      if (_jspx_th_i18n_005fmessage_005f5.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey_005fnobody.reuse(_jspx_th_i18n_005fmessage_005f5);
      _jspx_th_i18n_005fmessage_005f5_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fmessage_005f5, _jsp_getInstanceManager(), _jspx_th_i18n_005fmessage_005f5_reused);
    }
    return false;
  }

  private boolean _jspx_meth_factory_005fencode_005f1(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  factory:encode
    org.jboss.dashboard.ui.taglib.factory.EncodeTag _jspx_th_factory_005fencode_005f1 = (org.jboss.dashboard.ui.taglib.factory.EncodeTag) _005fjspx_005ftagPool_005ffactory_005fencode_0026_005fname_005fnobody.get(org.jboss.dashboard.ui.taglib.factory.EncodeTag.class);
    boolean _jspx_th_factory_005fencode_005f1_reused = false;
    try {
      _jspx_th_factory_005fencode_005f1.setPageContext(_jspx_page_context);
      _jspx_th_factory_005fencode_005f1.setParent(null);
      // /components/bam/provider/sql_edit.jsp(89,141) name = name type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_factory_005fencode_005f1.setName("testProviderConfigPressed");
      int _jspx_eval_factory_005fencode_005f1 = _jspx_th_factory_005fencode_005f1.doStartTag();
      if (_jspx_th_factory_005fencode_005f1.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005ffactory_005fencode_0026_005fname_005fnobody.reuse(_jspx_th_factory_005fencode_005f1);
      _jspx_th_factory_005fencode_005f1_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_factory_005fencode_005f1, _jsp_getInstanceManager(), _jspx_th_factory_005fencode_005f1_reused);
    }
    return false;
  }
}
