using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Web;
using System.Net;

namespace WebFox.Controllers
{
    [Route(""api/[controller]"")]
    [ApiController]
    public class XSS : ControllerBase
    {
        public async void xss(string userInfo)
        {
            var context = this.ControllerContext.HttpContext;
            var encodedUserInfo = WebUtility.HtmlEncode(userInfo);

            await context.Response.WriteAsync(""<body>""+ encodedUserInfo +""</body>"");
        }
    }
}