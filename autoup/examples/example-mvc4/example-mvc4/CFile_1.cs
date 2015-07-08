using System;
using System.Collections.Concurrent;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;

namespace example_mvc4
{
    //Chunk File
    public class CFile
    {
        private string _Path;
        private long _TotalSize;
        private long _TotalWrited;

        public long Percent
        {
            get
            {
                return (_TotalWrited * 100) / _TotalSize;
            }
        }


        public CFile(string _path, long size)
        {
            _Path = _path;
            _TotalSize = size;

            CreateDump();
        }

        private void CreateDump()
        {
            using (FileStream fs = new FileStream(_Path, FileMode.CreateNew))
            {
                fs.Seek(_TotalSize - 1, SeekOrigin.Begin);
                fs.WriteByte(0);
            }
        }


        public async void Upload(Stream InputStream, int position)
        {
            if (!File.Exists(_Path))
            {
                CreateDump();
            }

            var bytes = ReadToEnd(InputStream);

            if (bytes.Length > 0)
            {
                _TotalWrited += bytes.Length;
                using (FileStream fs = new FileStream(_Path, FileMode.Open, FileAccess.Write, FileShare.Write, bytes.Length, true))
                {
                    fs.Seek(position, SeekOrigin.Begin);
                    await fs.WriteAsync(bytes, 0, bytes.Length);
                }
            }
        }

        public static void StreamToFile(Stream stream, string path)
        {
            using (FileStream fileStream = new FileStream(path, FileMode.Create))
            {
                stream.CopyTo((Stream)fileStream);
                fileStream.Close();
            }
        }

        public static void StreamToFileResumable(Stream stream, string path, int position)
        {
            using (FileStream fileStream = File.OpenWrite(path))
            {
                fileStream.Seek(position, SeekOrigin.Begin);
                stream.CopyTo((Stream)fileStream);
                fileStream.Close();
            }
        }


        //http://stackoverflow.com/questions/1080442/how-to-convert-an-stream-into-a-byte-in-c
        public static byte[] ReadToEnd(System.IO.Stream stream)
        {
            long originalPosition = 0;

            if (stream.CanSeek)
            {
                originalPosition = stream.Position;
                stream.Position = 0;
            }

            try
            {
                byte[] readBuffer = new byte[4096];

                int totalBytesRead = 0;
                int bytesRead;

                while ((bytesRead = stream.Read(readBuffer, totalBytesRead, readBuffer.Length - totalBytesRead)) > 0)
                {
                    totalBytesRead += bytesRead;

                    if (totalBytesRead == readBuffer.Length)
                    {
                        int nextByte = stream.ReadByte();
                        if (nextByte != -1)
                        {
                            byte[] temp = new byte[readBuffer.Length * 2];
                            Buffer.BlockCopy(readBuffer, 0, temp, 0, readBuffer.Length);
                            Buffer.SetByte(temp, totalBytesRead, (byte)nextByte);
                            readBuffer = temp;
                            totalBytesRead++;
                        }
                    }
                }

                byte[] buffer = readBuffer;
                if (readBuffer.Length != totalBytesRead)
                {
                    buffer = new byte[totalBytesRead];
                    Buffer.BlockCopy(readBuffer, 0, buffer, 0, totalBytesRead);
                }
                return buffer;
            }
            finally
            {
                if (stream.CanSeek)
                {
                    stream.Position = originalPosition;
                }
            }
        }


    }
}