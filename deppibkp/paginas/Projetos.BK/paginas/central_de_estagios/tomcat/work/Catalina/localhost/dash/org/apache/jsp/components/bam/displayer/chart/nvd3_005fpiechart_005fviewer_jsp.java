/*
 * Generated by the Jasper component of Apache Tomcat
 * Version: Apache Tomcat/7.0.79
 * Generated at: 2017-10-09 00:04:00 UTC
 * Note: The last modified time of this file was set to
 *       the last modified time of the source file after
 *       generation to assist with modification tracking.
 */
package org.apache.jsp.components.bam.displayer.chart;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import org.jboss.dashboard.ui.UIServices;
import org.jboss.dashboard.ui.components.chart.NVD3ChartViewer;
import org.jboss.dashboard.displayer.chart.AbstractChartDisplayer;
import org.jboss.dashboard.ui.UIBeanLocator;
import java.util.Map;
import java.util.HashMap;
import org.jboss.dashboard.ui.components.chart.NVD3ChartViewer;
import org.jboss.dashboard.displayer.chart.AbstractChartDisplayer;
import org.jboss.dashboard.displayer.chart.AbstractXAxisDisplayer;
import org.jboss.dashboard.ui.components.chart.AbstractChartDisplayerEditor;
import org.jboss.dashboard.dataset.DataSet;
import org.jboss.dashboard.domain.Interval;
import org.jboss.dashboard.provider.DataProperty;
import java.util.ArrayList;
import java.util.List;
import java.util.Locale;
import java.text.DecimalFormat;
import org.jboss.dashboard.LocaleManager;
import org.jboss.dashboard.commons.text.StringUtil;
import org.apache.commons.lang3.StringUtils;

public final class nvd3_005fpiechart_005fviewer_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final javax.servlet.jsp.JspFactory _jspxFactory =
          javax.servlet.jsp.JspFactory.getDefaultFactory();

  private static java.util.Map<java.lang.String,java.lang.Long> _jspx_dependants;

  static {
    _jspx_dependants = new java.util.HashMap<java.lang.String,java.lang.Long>(3);
    _jspx_dependants.put("/components/bam/displayer/chart/nvd3_chart_common.jsp", Long.valueOf(1460669778000L));
    _jspx_dependants.put("/components/bam/displayer/chart/nvd3_piechart_script.jsp", Long.valueOf(1460669778000L));
    _jspx_dependants.put("/components/bam/displayer/chart/nvd3_chart_wrapper.jsp", Long.valueOf(1460669778000L));
  }

  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fbaseName_005fnobody;
  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey;
  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005ffactory_005fformUrl_0026_005ffriendly_005fnobody;
  private org.apache.jasper.runtime.TagHandlerPool _005fjspx_005ftagPool_005ffactory_005fhandler_0026_005fbean_005faction_005fnobody;

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
    _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fbaseName_005fnobody = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
    _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
    _005fjspx_005ftagPool_005ffactory_005fformUrl_0026_005ffriendly_005fnobody = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
    _005fjspx_005ftagPool_005ffactory_005fhandler_0026_005fbean_005faction_005fnobody = org.apache.jasper.runtime.TagHandlerPool.getTagHandlerPool(getServletConfig());
  }

  public void _jspDestroy() {
    _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fbaseName_005fnobody.release();
    _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey.release();
    _005fjspx_005ftagPool_005ffactory_005fformUrl_0026_005ffriendly_005fnobody.release();
    _005fjspx_005ftagPool_005ffactory_005fhandler_0026_005fbean_005faction_005fnobody.release();
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

    NVD3ChartViewer viewer = (NVD3ChartViewer) UIBeanLocator.lookup().getCurrentBean(request);
    AbstractChartDisplayer displayer = (AbstractChartDisplayer) viewer.getDataDisplayer();

      out.write('\n');
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
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      //  i18n:bundle
      org.jboss.dashboard.ui.taglib.BundleTag _jspx_th_i18n_005fbundle_005f0 = (org.jboss.dashboard.ui.taglib.BundleTag) _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fbaseName_005fnobody.get(org.jboss.dashboard.ui.taglib.BundleTag.class);
      boolean _jspx_th_i18n_005fbundle_005f0_reused = false;
      try {
        _jspx_th_i18n_005fbundle_005f0.setPageContext(_jspx_page_context);
        _jspx_th_i18n_005fbundle_005f0.setParent(null);
        // /components/bam/displayer/chart/nvd3_chart_common.jsp(36,0) name = baseName type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
        _jspx_th_i18n_005fbundle_005f0.setBaseName("org.jboss.dashboard.displayer.nvd3.messages");
        // /components/bam/displayer/chart/nvd3_chart_common.jsp(36,0) name = locale type = null reqTime = true required = false fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
        _jspx_th_i18n_005fbundle_005f0.setLocale( LocaleManager.currentLocale() );
        int _jspx_eval_i18n_005fbundle_005f0 = _jspx_th_i18n_005fbundle_005f0.doStartTag();
        if (_jspx_th_i18n_005fbundle_005f0.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
          return;
        }
        _005fjspx_005ftagPool_005fi18n_005fbundle_0026_005flocale_005fbaseName_005fnobody.reuse(_jspx_th_i18n_005fbundle_005f0);
        _jspx_th_i18n_005fbundle_005f0_reused = true;
      } finally {
        org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fbundle_005f0, _jsp_getInstanceManager(), _jspx_th_i18n_005fbundle_005f0_reused);
      }
      out.write('\n');


    DataSet xyDataSet = null;
    if( displayer != null ) {
        xyDataSet = displayer.buildXYDataSet();
    }

    AbstractChartDisplayerEditor editor = (AbstractChartDisplayerEditor) request.getAttribute("editor");
    boolean animateChart = (editor == null);
    boolean enableDrillDown = (editor == null);
    boolean enableTooltips  = (editor == null);

    if (xyDataSet == null) {

      out.write("\n");
      out.write("    <span class=\"skn-error\">\n");
      out.write("        ");
      if (_jspx_meth_i18n_005fmessage_005f0(_jspx_page_context))
        return;
      out.write("\n");
      out.write("    </span>\n");

       return;
    }
    if (xyDataSet.getRowCount() == 0) {

      out.write("\n");
      out.write("    <table width=\"");
      out.print( displayer.getWidth());
      out.write("\" height=\"");
      out.print( displayer.getHeight());
      out.write("\">\n");
      out.write("        <tr><td align=\"center\" valign=\"center\">");
      if (_jspx_meth_i18n_005fmessage_005f1(_jspx_page_context))
        return;
      out.write("</td></tr>\n");
      out.write("    </table>\n");

        return;
    }

    DataProperty domainProperty = displayer.getDomainProperty();
    DataProperty rangeProperty = displayer.getRangeProperty();
    Locale locale = LocaleManager.currentLocale();
    DecimalFormat numberFormat = (DecimalFormat) DecimalFormat.getInstance(Locale.US);
    numberFormat.setGroupingUsed(false);
    List<String> xvalues = new ArrayList<String>();
    List<String> yvalues = new ArrayList<String>();
    double minDsValue = -1;
    double maxDsValue = -1;

    for (int i=0; i< xyDataSet.getRowCount(); i++) {
        String xvalue = ((Interval) xyDataSet.getValueAt(i, 0)).getDescription(locale);
        double yvalue = ((Number) xyDataSet.getValueAt(i, 1)).doubleValue();

        xvalues.add(StringUtil.escapeQuotes(xvalue));
        yvalues.add(numberFormat.format(yvalue));

        // Get the minimum and the maximum value of the dataset.
        if ((minDsValue == -1) || (yvalue < minDsValue)) minDsValue = yvalue;
        if ((maxDsValue == -1) || (yvalue > maxDsValue)) maxDsValue = yvalue;
    }

    // Every chart must have a different identifier so as to do not merge tooltips.
    int suffix = viewer.hashCode();
    if (suffix < 0) suffix *= -1;
    String chartId = viewer.getBeanName() + suffix;

    String selectedColor = displayer.getColor();
    if (selectedColor == null || selectedColor.equals(displayer.getBackgroundColor())) {
       selectedColor = "#0000FF"; // Default blue if not changed
    }

      out.write('\n');
      out.write('\n');

  if (xyDataSet == null || xyDataSet.getRowCount() == 0) {
    // No data available
    return;
  }

      out.write('\n');
      out.write('\n');
      out.write('\n');
      out.write('\n');
 if( editor != null ) {
    session.setAttribute("chartId_iframe_viewer"+chartId, viewer);
    String jsp = "/components/bam/displayer/chart/nvd3_piechart_viewer_iframe.jsp";
    Map params = new HashMap();
    params.put("chartId", chartId);
    String iframeUrl = UIServices.lookup().getUrlMarkupGenerator().getLinkToJsp(jsp, params);

      out.write("\n");
      out.write("     ");
      out.write("\n");
      out.write("     <iframe\n");
      out.write("         width=\"650px\" height=\"450px\"\n");
      out.write("         style=\"border:0px;overflow: auto;\"\n");
      out.write("          src=\"");
      out.print(iframeUrl );
      out.write("\">\n");
      out.write("     </iframe>\n");
 }
   else {

      out.write('\n');
      out.write('\n');
      out.write('\n');
      out.write('\n');
 if( enableDrillDown ) { 
      out.write("\n");
      out.write("<!-- Form for drill down action -->\n");
      out.write("<form method=\"post\" action='");
      if (_jspx_meth_factory_005fformUrl_005f0(_jspx_page_context))
        return;
      out.write("' id='");
      out.print("form"+chartId);
      out.write("'>\n");
      out.write("  ");
      //  factory:handler
      org.jboss.dashboard.ui.taglib.factory.HandlerTag _jspx_th_factory_005fhandler_005f0 = (org.jboss.dashboard.ui.taglib.factory.HandlerTag) _005fjspx_005ftagPool_005ffactory_005fhandler_0026_005fbean_005faction_005fnobody.get(org.jboss.dashboard.ui.taglib.factory.HandlerTag.class);
      boolean _jspx_th_factory_005fhandler_005f0_reused = false;
      try {
        _jspx_th_factory_005fhandler_005f0.setPageContext(_jspx_page_context);
        _jspx_th_factory_005fhandler_005f0.setParent(null);
        // /components/bam/displayer/chart/nvd3_piechart_viewer.jsp(60,2) name = bean type = null reqTime = true required = false fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
        _jspx_th_factory_005fhandler_005f0.setBean(viewer.getBeanName());
        // /components/bam/displayer/chart/nvd3_piechart_viewer.jsp(60,2) name = action type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
        _jspx_th_factory_005fhandler_005f0.setAction( NVD3ChartViewer.PARAM_ACTION );
        int _jspx_eval_factory_005fhandler_005f0 = _jspx_th_factory_005fhandler_005f0.doStartTag();
        if (_jspx_th_factory_005fhandler_005f0.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
          return;
        }
        _005fjspx_005ftagPool_005ffactory_005fhandler_0026_005fbean_005faction_005fnobody.reuse(_jspx_th_factory_005fhandler_005f0);
        _jspx_th_factory_005fhandler_005f0_reused = true;
      } finally {
        org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_factory_005fhandler_005f0, _jsp_getInstanceManager(), _jspx_th_factory_005fhandler_005f0_reused);
      }
      out.write("\n");
      out.write("  <input type=\"hidden\" name=\"");
      out.print( NVD3ChartViewer.PARAM_NSERIE );
      out.write("\" value=\"0\" />\n");
      out.write("</form>\n");
      out.write("<script defer=\"true\">\n");
      out.write("    setAjax('");
      out.print("form"+chartId);
      out.write("');\n");
      out.write("</script>\n");
 } 
      out.write('\n');
      out.write("\n");
      out.write("<!-- Chart wrapper begin -->\n");
      out.write("<table class=\"skn-chart-table\" width=\"100%\" >\n");
      out.write("    <tbody>\n");
      out.write("    <tr>\n");
      out.write("        <td height=\"");
      out.print( displayer.getHeight() );
      out.write("\" align=\"");
      out.print(displayer.getGraphicAlign());
      out.write("\" style=\"\">\n");
 if( displayer.isShowTitle() && displayer.getTitle() != null) { 
      out.write("\n");
      out.write("            <div id=\"title");
      out.print(chartId);
      out.write("\" class=\"skn-chart-title\" style=\"width:");
      out.print( displayer.getWidth() );
      out.write("px\">");
      out.print(displayer.getTitle());
      out.write("</div>\n");
 } 
      out.write("\n");
      out.write("            <div id=\"tooltip");
      out.print(chartId);
      out.write("\" class=\"skn-chart-tooltip\" style=\"width:");
      out.print( displayer.getWidth() );
      out.write("px\"></div>\n");
      out.write("            <div class=\"skn-chart-wrapper\" style=\"width:");
      out.print( displayer.getWidth() );
      out.write("px;height:");
      out.print( displayer.getHeight() );
      out.write("px\" id=\"");
      out.print( chartId );
      out.write("\">\n");
      out.write("                <svg></svg>\n");
      out.write("            </div>\n");
      out.write("        </td>\n");
      out.write("    </tr>\n");
      out.write("    </tbody>\n");
      out.write("</table>\n");
      out.write("<!-- Chart wrapper end -->");
      out.write('\n');
      out.write('\n');

    int decimalPrecision = 2;
    if (displayer.isAxisInteger()) decimalPrecision = 0;

      out.write("\n");
      out.write("<script type=\"text/javascript\" defer=\"defer\">\n");
      out.write("    chartData");
      out.print(chartId);
      out.write(" = [\n");
      out.write("        {\n");
      out.write("            key: \"");
      out.print( displayer.getTitle() );
      out.write("\",\n");
      out.write("            values: [\n");
      out.write("                ");
 for(int i=0; i < xvalues.size(); i++) { if( i != 0 ) out.print(", "); 
      out.write("\n");
      out.write("                {\n");
      out.write("                    \"label\" : \"");
      out.print( xvalues.get(i) );
      out.write("\" ,\n");
      out.write("                    \"value\" : ");
      out.print( yvalues.get(i) );
      out.write("\n");
      out.write("                }\n");
      out.write("                ");
 } 
      out.write("\n");
      out.write("            ]\n");
      out.write("        }\n");
      out.write("    ];\n");
      out.write("\n");
      out.write("    nv.addGraph({\n");
      out.write("      generate: function() {\n");
      out.write("            var chart = nv.models.pieChart();\n");
      out.write("\n");
      out.write("             chart  .x(function(d) { return d.label })\n");
      out.write("                    .y(function(d) { return d.value })\n");
      out.write("                    .width(");
      out.print( displayer.getWidth() );
      out.write(")\n");
      out.write("                    .height(");
      out.print( displayer.getHeight() );
      out.write(")\n");
      out.write("                    .showLegend(");
      out.print(displayer.isShowLegend() );
      out.write(")\n");
      out.write("                    .showLabels(");
      out.print(displayer.isShowLabelsXAxis() );
      out.write(")\n");
      out.write("                    .margin({top: ");
      out.print(displayer.getMarginTop());
      out.write(", right: ");
      out.print(displayer.getMarginRight());
      out.write(", bottom: ");
      out.print(displayer.getMarginBottom());
      out.write(", left: ");
      out.print(displayer.getMarginLeft());
      out.write("});\n");
      out.write("\n");
      out.write("               d3.select('#");
      out.print( chartId );
      out.write(" svg')\n");
      out.write("                    .datum(chartData");
      out.print(chartId);
      out.write(')');
      out.write('\n');
 if(animateChart) { 
      out.write(" .transition().duration(1200) ");
 } 
      out.write("\n");
      out.write("                    .call(chart);\n");
      out.write("\n");
      out.write("               nv.utils.windowResize(chart.update);\n");
      out.write("\n");
      out.write("            return chart;\n");
      out.write("\n");
      out.write("      },\n");
      out.write("      callback: function(graph) {\n");
      out.write("       ");
 if( enableDrillDown ) {
      out.write("\n");
      out.write("          graph.pie.dispatch.on('elementClick', function(e) {\n");
      out.write("          form = document.getElementById('");
      out.print("form"+chartId);
      out.write("');\n");
      out.write("          form.");
      out.print( NVD3ChartViewer.PARAM_NSERIE );
      out.write(".value = e.index;\n");
      out.write("          submitAjaxForm(form);\n");
      out.write("          });\n");
      out.write("       ");
 } 
      out.write("\n");
      out.write("\n");
      out.write("        graph.dispatch.on('tooltipShow', function(e, offsetElement) {\n");
      out.write("        ");
 if(enableTooltips) { 
      out.write("\n");
      out.write("            x = e.label;\n");
      out.write("            y = d3.format(',.");
      out.print(decimalPrecision);
      out.write("f')(e.value);\n");
      out.write("\n");
      out.write("            content = x + \" : \" + y;\n");
      out.write("            document.getElementById(\"tooltip");
      out.print(chartId);
      out.write("\").innerHTML=content;\n");
      out.write("\n");
      out.write("            ");
 } 
      out.write("\n");
      out.write("          });\n");
      out.write("      }\n");
      out.write("  });\n");
      out.write("</script>\n");
      out.write('\n');

   }

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
      // /components/bam/displayer/chart/nvd3_chart_common.jsp(52,8) name = key type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_i18n_005fmessage_005f0.setKey("nvd3.error");
      int _jspx_eval_i18n_005fmessage_005f0 = _jspx_th_i18n_005fmessage_005f0.doStartTag();
      if (_jspx_eval_i18n_005fmessage_005f0 != javax.servlet.jsp.tagext.Tag.SKIP_BODY) {
        if (_jspx_eval_i18n_005fmessage_005f0 != javax.servlet.jsp.tagext.Tag.EVAL_BODY_INCLUDE) {
          out = org.apache.jasper.runtime.JspRuntimeLibrary.startBufferedBody(_jspx_page_context, _jspx_th_i18n_005fmessage_005f0);
        }
        do {
          out.write("The data cannot be displayed due to an unexpected problem");
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
    org.jboss.dashboard.ui.taglib.MessageTag _jspx_th_i18n_005fmessage_005f1 = (org.jboss.dashboard.ui.taglib.MessageTag) _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey.get(org.jboss.dashboard.ui.taglib.MessageTag.class);
    boolean _jspx_th_i18n_005fmessage_005f1_reused = false;
    try {
      _jspx_th_i18n_005fmessage_005f1.setPageContext(_jspx_page_context);
      _jspx_th_i18n_005fmessage_005f1.setParent(null);
      // /components/bam/displayer/chart/nvd3_chart_common.jsp(60,47) name = key type = null reqTime = true required = true fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_i18n_005fmessage_005f1.setKey("nvd3.noData");
      int _jspx_eval_i18n_005fmessage_005f1 = _jspx_th_i18n_005fmessage_005f1.doStartTag();
      if (_jspx_eval_i18n_005fmessage_005f1 != javax.servlet.jsp.tagext.Tag.SKIP_BODY) {
        if (_jspx_eval_i18n_005fmessage_005f1 != javax.servlet.jsp.tagext.Tag.EVAL_BODY_INCLUDE) {
          out = org.apache.jasper.runtime.JspRuntimeLibrary.startBufferedBody(_jspx_page_context, _jspx_th_i18n_005fmessage_005f1);
        }
        do {
          out.write("NO DATA");
          int evalDoAfterBody = _jspx_th_i18n_005fmessage_005f1.doAfterBody();
          if (evalDoAfterBody != javax.servlet.jsp.tagext.BodyTag.EVAL_BODY_AGAIN)
            break;
        } while (true);
        if (_jspx_eval_i18n_005fmessage_005f1 != javax.servlet.jsp.tagext.Tag.EVAL_BODY_INCLUDE) {
          out = _jspx_page_context.popBody();
        }
      }
      if (_jspx_th_i18n_005fmessage_005f1.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005fi18n_005fmessage_0026_005fkey.reuse(_jspx_th_i18n_005fmessage_005f1);
      _jspx_th_i18n_005fmessage_005f1_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_i18n_005fmessage_005f1, _jsp_getInstanceManager(), _jspx_th_i18n_005fmessage_005f1_reused);
    }
    return false;
  }

  private boolean _jspx_meth_factory_005fformUrl_005f0(javax.servlet.jsp.PageContext _jspx_page_context)
          throws java.lang.Throwable {
    javax.servlet.jsp.PageContext pageContext = _jspx_page_context;
    javax.servlet.jsp.JspWriter out = _jspx_page_context.getOut();
    //  factory:formUrl
    org.jboss.dashboard.ui.taglib.factory.FormURLTag _jspx_th_factory_005fformUrl_005f0 = (org.jboss.dashboard.ui.taglib.factory.FormURLTag) _005fjspx_005ftagPool_005ffactory_005fformUrl_0026_005ffriendly_005fnobody.get(org.jboss.dashboard.ui.taglib.factory.FormURLTag.class);
    boolean _jspx_th_factory_005fformUrl_005f0_reused = false;
    try {
      _jspx_th_factory_005fformUrl_005f0.setPageContext(_jspx_page_context);
      _jspx_th_factory_005fformUrl_005f0.setParent(null);
      // /components/bam/displayer/chart/nvd3_piechart_viewer.jsp(59,28) name = friendly type = null reqTime = true required = false fragment = false deferredValue = false expectedTypeName = null deferredMethod = false methodSignature = null
      _jspx_th_factory_005fformUrl_005f0.setFriendly(false);
      int _jspx_eval_factory_005fformUrl_005f0 = _jspx_th_factory_005fformUrl_005f0.doStartTag();
      if (_jspx_th_factory_005fformUrl_005f0.doEndTag() == javax.servlet.jsp.tagext.Tag.SKIP_PAGE) {
        return true;
      }
      _005fjspx_005ftagPool_005ffactory_005fformUrl_0026_005ffriendly_005fnobody.reuse(_jspx_th_factory_005fformUrl_005f0);
      _jspx_th_factory_005fformUrl_005f0_reused = true;
    } finally {
      org.apache.jasper.runtime.JspRuntimeLibrary.releaseTag(_jspx_th_factory_005fformUrl_005f0, _jsp_getInstanceManager(), _jspx_th_factory_005fformUrl_005f0_reused);
    }
    return false;
  }
}
