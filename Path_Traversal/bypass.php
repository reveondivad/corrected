import java.nio.file.Path;
import java.nio.file.Paths;

String path = System.console().readLine(""Enter file path:"");
Path safePath = Paths.get(""/safe_dir/"");
Path inputPath = Paths.get(path);

if (inputPath.startsWith(safePath)) {
    File f = new File(inputPath.toString());
    if (f.exists()) {
        f.delete();
    }
}