# 7 - HTTP

Hyper Text Transfer Protocol, que é uma camada de aplicação, um protocolo para transferência de documentos. É stateless, pois não existe histórico acerca dos últimos pedidos. Cada pedido é novo, pelo que é importante enviar no head a chave da sessão. Todo o estado da sessão é mantido na parte do cliente.

## URI, URN, URL

URI (Uniform Resource Identifier) é uma identificador que nos permite referenciar um recurso. URI é uma superclasse que contém URL (Uniform Resource Locator) e URN (Uniform Resource Names). URN identificam pelo nome (exemplo do nariz do furão) e não pela localização. URL identificam algo segundo a sua localização na rede. 

## HTTPS

Versão segura e criptografada do HTTP, usando uma camada de segurança de SSL e TLS. 

## Métodos

A resposta para cada método a seguir tem forma XXX. Pode ser:
- Informação (1XX);
- Sucess (2XX);
- Redirection (3XX);
- Client Error (4XX);
- Server Error (5XX);

```php
if ($_SERVER['REQUEST_METHOD'] == 'PUT') { 
    // update resource
} 

if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
    echo json_encode($employees);
}
```

### GET e HEAD

São métodos seguros (também idempotentes), obrigatórios para servidores HTTP, e que não alteram o estado do servidor. 

### DELETE e PUT

São métodos idempotentes. Um cria um recurso numa determinada URL, outro apaga o mesmo. Não acontece mais por serem chamados X vezes. Chamar uma vez e chamar muitas é a mesma coisa. Tem side-efects no servidor.

### POST e outros

Pedido para ser gerado um novo URL. Também tem side-efects no servidor. 

## REST

Representational State Transfer é um estilo de arquitetura baseado em recursos e não em ações. Funciona com comunicações client-server stateless.  