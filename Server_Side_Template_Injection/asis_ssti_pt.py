package main

import (
	""html/template""
	""bufio""
	""log""
	""os""
)

type Person string

func (p Person) Secret (test string) string {
	return ""Secret functionality has been removed due to security concerns.""
}

func (p Person) Label (test string) string {
	return ""This is "" + string(test)
}

func main(){
	reader := bufio.NewReader(os.Stdin)
	text, _ := reader.ReadString('\n')
	tmpl, err := template.New("""").Parse(text)
	if err != nil {
		log.Fatalf(""Parse: %v"", err)
	}
	tmpl.Execute(os.Stdout,Person(""Gus""))
}