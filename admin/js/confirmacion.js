function confirmacion(e) {
    if (confirm("Estas seguro que desea eliminar este registro?"))
    {
        return true;
    }
    else 
    {
        e.preventDefault();
    }
} 

let linkDelete = document.querySelectorAll(".btn__delete");

for (var i = 0; i < linkDelete.length; i++) 
{
    linkDelete[i].addEventListener("click", confirmacion);
}