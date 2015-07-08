using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;
using tQeraUploader;

namespace example_webform
{
    /// <summary>
    /// Summary description for WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {

        [WebMethod]
        public string HelloWorld()
        {
            return "Hello World";
        }

        [WebMethod]
        public string Receive()
        {

            bool thumb = Convert.ToBoolean(HttpContext.Current.Request.Headers["Uploader-Thumb"]);

            int thumb_width = Convert.ToInt32(HttpContext.Current.Request.Headers["Uploader-ThumbHeight"]);
            int thumb_height = Convert.ToInt32(HttpContext.Current.Request.Headers["Uploader-ThumbWidth"]);
            string name = HttpContext.Current.Request.Headers["Uploader-Name"];


            TFile file = new TFile(HttpContext.Current.Server.MapPath("~/uploads/images"), HttpContext.Current.Server.MapPath("~/uploads/thumbnails"), thumb_width, thumb_height);

            if (file.UploadAjax(HttpContext.Current.Request.InputStream, name , thumb) == -1) //fail
            {
                return "false";
            }
            else //success
            {
                return "true";
            }
        }
    }
}
