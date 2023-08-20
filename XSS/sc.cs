using System.Net;
using System.Security.Cryptography;
using Microsoft.AspNetCore.Http;

namespace WebFox.Controllers
{
    public class SecureCookieTest2
    {
        public void DoPost(HttpWebResponse response, HttpWebRequest request)
        {
            DoGet(response, request);
        }

        public void DoGet(HttpWebResponse response, HttpWebRequest request)
        {
            Secure(response, request);
        }

        public void Secure(HttpWebResponse response, HttpWebRequest request)
        {
            var rng = new RNGCryptoServiceProvider();
            byte[] tokenData = new byte[32];
            rng.GetBytes(tokenData);

            string token = Convert.ToBase64String(tokenData);
            var secureCookie = new Cookie(""token"", token) { Secure = true, HttpOnly = true };
            response.Cookies.Add(secureCookie);
        }
    }
}