using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Web;
using System.Web.Mvc;

namespace example_mvc4.Controllers
{
    public class HomeController : Controller
    {
        //
        // GET: /Home/
        //
        // GET: /Home/
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult HTML4()
        {
            return View();
        }

        public ActionResult NoWM()
        {
            return View();
        }

        public ActionResult Test()
        {
            return View();
        }

        //You should use more complecated system instead of this. Like with UserID or SessionID or something you want. Otherwise it could be problem.
        public static Dictionary<string, CFile> chunkFilesPath = new Dictionary<string, CFile>();


        //ajax
        [HttpPost]
        public async Task<ActionResult> Receive()
        {
            bool thumb = true;

            int thumb_width = 200;
            int thumb_height = 200;
            string name = Request.Headers["UploaderName"];

            bool chunk = bool.Parse(Request.Headers["Chunk"]);

            if (chunk)
            {
                var fileName = Request.Headers["FileName"];
                var size = int.Parse(Request.Headers["FileSize"]);
                
                CFile file = null;

                //Check it if there is a file with that name and if there is not create one
                if (!chunkFilesPath.ContainsKey(fileName))
                {
                    file = new CFile(Server.MapPath("~/uploads") + "/" + fileName, size);
                    chunkFilesPath.Add(fileName, file);
                }

                //Write the partion of the file with the position.
                if (chunkFilesPath.TryGetValue(fileName, out file))
                {
                    var stream = Request.InputStream;
                    var position = int.Parse(Request.Headers["ChunkPosition"]);

                    file.Upload(stream, position);
                }

                //If it is %100 then remove it from the dictionary.
                if (file.Percent == 100)
                {
                    chunkFilesPath.Remove(fileName);
                }

                return Json(true);
            }
            else
            {
                TFile file = new TFile(Server.MapPath("~/uploads/images"), Server.MapPath("~/uploads/thumbnails"), thumb_width, thumb_height);

                if (file.UploadAjax(Request.InputStream, name, thumb) == -1) //fail
                {
                    return Json(false);
                }
                else //success
                {
                    return Json(true);
                }

            }

        }

        //old school
        [HttpPost]
        public ActionResult ReceiveForm(HttpPostedFileBase fileInput, int ThumbHeight, int ThumbWidth)
        {
            int thumb_width = ThumbHeight;
            int thumb_height = ThumbWidth;

            TFile file = new TFile(Server.MapPath("~/uploads/images"), Server.MapPath("~/uploads/thumbnails"), thumb_width, thumb_height);

            if (file.UploadForm(fileInput, false) == -1) //fail
            {
                return Json(false);
            }
            else //success
            {
                return Json(true);
            }
        }
    }
}
