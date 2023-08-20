using Microsoft.AspNetCore.Mvc;
using System;
using System.Diagnostics;

namespace WebFox.Controllers
{
    [Route(""api/[controller]"")]
    [ApiController]
    public class OsInjection : ControllerBase
    {
        [HttpGet(""{binFile}"")]
        public ActionResult<string> os(string binFile)
        {
            if (string.IsNullOrEmpty(binFile) || string.IsNullOrWhiteSpace(binFile))
            {
                return BadRequest(""Invalid input."");
            }

            string[] safeBinFiles = { ""binFile1"", ""binFile2"", ""binFile3"" }; // define safe bin files

            if (!Array.Exists(safeBinFiles, element => element == binFile))
            {
                return BadRequest(""Invalid bin file."");
            }

            Process p = new Process();
            p.StartInfo.FileName = binFile;
            p.StartInfo.RedirectStandardOutput = true;
            p.Start();
            string output = p.StandardOutput.ReadToEnd();
            p.Dispose();
            return Ok(output);
        }
    }
}