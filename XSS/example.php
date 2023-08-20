<script>
window.addEventListener('message', writeMessage, false);
function writeMessage(event)
{
    var message = document.createTextNode(event.data);
    document.getElementById(""message"").appendChild(message);
}
</script>