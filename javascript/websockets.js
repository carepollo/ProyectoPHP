// websoket cliente
// conexiones websocket

const socket = new WebSocket('ws://localhost:8080');
//var name = prompt('YOUR NAME?');

socket.onopen = () => {
    open_send = JSON.stringify({
        type: "name",
        data: name,
    });
    socket.send(open_send);
}
socket.onmessage = (e) => {
    var json = JSON.parse(e.data);
    console.warn(e);
    document.getElementById('log').innerHTML += '<p class="m-0 d-block"><b>'+json.name+': </b>'+json.data+'</p>';
}
socket.onclose = () => {
    console.warn('cerrando socket');
}
socket.onerror = () => {
    console.warn('Malfunction on socket');
}


// websockets eventos
const chatWindow = document.getElementById('chat');
const chatBtn = document.getElementById('ws_sender');
const chatText = document.getElementById('ws_texto');

function clientSend(input){
    let msg = document.getElementById(input);
    if (msg.value != '') {
        socket.send(JSON.stringify({
            type: "message",
            data: msg.value
        }));
        //reproducir sonido de envio de mensaje
        document.getElementById('log').innerHTML += '<p class="m-0 d-block"><b class="text-primary">Usted: </b>' + msg.value + '</p>';
        msg.value = '';
        msg.focus();
    }
    else {
        return null;
    }

}

chatBtn.addEventListener('click', () => {
    clientSend(chatText.id);
});
chatText.addEventListener('keypress', (e) => {
    if (e.keyCode == 13 || e.keyCode == 10) {
        clientSend(chatText.id);
    }
    else {return null;}
});

