package com.example.springxss;

import org.springframework.http.HttpStatus;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.util.HtmlUtils;

@RestController
public class XSSController {

    @GetMapping(""/hello"")
    ResponseEntity<String> hello(@RequestParam(value = ""name"", defaultValue = ""World"") String name) {
        String safeName = HtmlUtils.htmlEscape(name);
        return new ResponseEntity<>(""Hello World!"" + safeName, HttpStatus.OK);
    }

}