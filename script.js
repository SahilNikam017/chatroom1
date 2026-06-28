//=====================================================
// LOAD ALL MESSAGES
//=====================================================

function loadMessages()
{
    fetch("receive.php")

    .then(response => response.json())

    .then(messages =>
    {
        let chatWindow =
            document.getElementById("chatWindow");

        chatWindow.innerHTML = "";

        messages.forEach(message =>
        {
            let bubble =
                document.createElement("div");

            // Own Message
            if(message.username == USERNAME)
            {
                bubble.className =
                    "message ownMessage";
            }

            // Other User Message
            else
            {
                bubble.className =
                    "message otherMessage";
            }

            bubble.innerHTML =

            "<strong>" +
            message.username +
            "</strong><br>" +

            message.message +

            "<br><small>" +

            message.time +

            "</small>";

            chatWindow.appendChild(bubble);
        });

        // Auto Scroll

        chatWindow.scrollTop =
            chatWindow.scrollHeight;
    });
}

//=====================================================
// SEND MESSAGE
//=====================================================

function sendMessage()
{
    let textbox =
        document.getElementById("message");

    let message =
        textbox.value.trim();

    if(message == "")
    {
        return;
    }

    fetch("send.php",
    {
        method: "POST",

        headers:
        {
            "Content-Type":
            "application/x-www-form-urlencoded"
        },

        body:
        "message=" +
        encodeURIComponent(message)
    })

    .then(response => response.text())

    .then(result =>
    {
        textbox.value = "";

        loadMessages();
    });
}

//=====================================================
// SEND USING ENTER KEY
//=====================================================

document
.getElementById("message")
.addEventListener(
"keypress",

function(event)
{
    if(event.key === "Enter")
    {
        event.preventDefault();

        sendMessage();
    }
});

//=====================================================
// INITIAL LOAD
//=====================================================

loadMessages();

//=====================================================
// AUTO REFRESH EVERY SECOND
//=====================================================

setInterval(loadMessages,1000);