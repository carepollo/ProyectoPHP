// como que esto sirbve para RECIBIR data

const server = require('ws').Server;
const webServer = new server ({port: 8080});

webServer.on('connection', (ws) => {
    ws.on('open', (mensaje) => {
        var receptor = JSON.parse(mensaje);
        console.log(receptor.data);
    });
    ws.on('message', (mensaje) => {
        console.log("recibe: " + mensaje);
        mensaje = JSON.parse(mensaje);
        if(mensaje.type == 'name'){
            ws.personName = mensaje.data;
            return;
        }
        webServer.clients.forEach(function e(client){
            if (client != ws)
                client.send(JSON.stringify({
                    name: ws.personName,
                    data: mensaje.data
                }));
        });
    });
    ws.on('close', () => {
        console.log('socket has left');
    });
    console.log('socket joined');
});

