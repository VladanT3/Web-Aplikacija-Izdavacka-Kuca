let provera = localStorage.getItem("proveraIzmene");

const btnUnos = document.getElementById('btnUnos');
const btnIzmena = document.getElementById('btnIzmena');
const knjigaID = document.getElementById('knjigaID');

if(provera == 1)
{
    btnUnos.disabled = true;
    btnIzmena.disabled = false;
    knjigaID.setAttribute("readonly", "true");
}