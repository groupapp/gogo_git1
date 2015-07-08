using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Helpers;

namespace example_mvc4
{
    public class TFile
    {
        private string _Path;
        private string _ThumbnailPath;
        private int _ThumbWidth;
        private int _ThumbHeight;

        public TFile(string Path, string ThumbnailPath, int ThumbWidth, int ThumbHeight)
        {
            this._Path = Path.EndsWith("/") ? Path : Path + "/";
            this._ThumbnailPath = ThumbnailPath.EndsWith("/") ? ThumbnailPath : ThumbnailPath + "/";
            this._ThumbWidth = ThumbWidth;
            this._ThumbHeight = ThumbHeight;
        }

        public int UploadAjax(Stream InputStream, string fileName, bool thumbnail = true)
        {
            int num = -1;
            using (StreamReader streamReader = new StreamReader(InputStream))
            {
                string[] strArray = streamReader.ReadToEnd().Split(new char[1] { ',' });
                string str1 = strArray[0].Split(new char[1] { ':' })[1];
                byte[] numArray = Convert.FromBase64String(strArray[1]);
                if (numArray.Length > 0)
                {
                    if (str1.Contains("image"))
                    {
                        string imageFormat = str1.Split(new char[1] { ';' })[0].Replace("image/", "");
                        WebImage webImage = new WebImage(numArray);
                        if (webImage != null)
                        {
                            string str2 = "upload_" + (object)DateTime.Now.Ticks;
                            webImage.Save(this._Path + str2, imageFormat, true);
                            if (thumbnail)
                            {
                                webImage.Resize(this._ThumbHeight, this._ThumbWidth, true, false);
                                webImage.Crop(1, 1, 0, 0).Save(this._ThumbnailPath + str2, imageFormat, true);
                            }
                            num = 1;
                        }
                    }
                    else
                    {
                        string str2 = "upload_" + (object)DateTime.Now.Ticks + new FileInfo(fileName).Extension;
                        TFile.StreamToFile((Stream)new MemoryStream(numArray), this._Path + str2);
                        num = 1;
                    }
                }
            }
            return num;
        }

        public int UploadForm(HttpPostedFileBase file, bool thumbnail = true)
        {
            int num = -1;
            if (file.ContentLength > 0)
            {
                if (file.ContentType.Contains("image"))
                {
                    WebImage webImage = new WebImage(file.InputStream);
                    if (webImage != null)
                    {
                        string imageFormat = file.ContentType.Replace("image/", "");
                        string str = "upload_" + (object)DateTime.Now.Ticks;
                        webImage.Save(this._Path + str, imageFormat, true);
                        if (thumbnail)
                        {
                            webImage.Resize(this._ThumbHeight, this._ThumbWidth, true, false);
                            webImage.Crop(1, 1, 0, 0).Save(this._ThumbnailPath + str, imageFormat, true);
                        }
                        num = 1;
                    }
                }
                else
                {
                    string str = "upload_" + (object)DateTime.Now.Ticks + new FileInfo(file.FileName).Extension;
                    TFile.StreamToFile(file.InputStream, this._Path + str);
                }
            }
            return num;
        }

        public static void StreamToFile(Stream stream, string path)
        {
            using (FileStream fileStream = new FileStream(path, FileMode.Create))
            {
                stream.CopyTo((Stream)fileStream);
                fileStream.Close();
            }
        }
    }
}