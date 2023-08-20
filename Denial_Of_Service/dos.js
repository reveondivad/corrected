Private Sub cmdRunNotePad_Click()
Dim str As String
Dim myVar As Integer
myVar = Integer.Parse(window.Text())
System.Threading.Thread.Sleep(myVar+1)
Dim dblNotePadID As Double = myVar
End Sub