using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Net;
using System.IO;
using System.Windows.Forms;

namespace CheckClient
{
    class Program
    {
        static string lastId;
        static void Main(string[] args)
        {
            try
            {
                using (var sr = new StreamReader("lastId.txt"))
                    lastId = sr.ReadLine();
            }
            catch
            {
                lastId = "";
            }
            var timer = new System.Threading.Timer(onTick, null, TimeSpan.Zero, TimeSpan.FromHours(1));
            while (true) Console.ReadKey();
        }
        private static void onTick(Object o)
        {
            HttpWebRequest req = (HttpWebRequest)WebRequest.Create("http://snowy.asia/rfwiki/QandA?a=check");
            // access req.Headers to get/set header values before calling GetResponse. 
            // req.CookieContainer allows you access cookies.

            var response = req.GetResponse();
            string webcontent;
            using (var strm = new StreamReader(response.GetResponseStream()))
            {
                webcontent = strm.ReadToEnd();
            }
            if (webcontent == "") MessageBox.Show("Error");
            else if (lastId != webcontent)
            {
                lastId = webcontent;
                using (var sw = new StreamWriter("lastId.txt")) sw.WriteLine(lastId);
                MessageBox.Show("New");
            }
        }
    } 
}
