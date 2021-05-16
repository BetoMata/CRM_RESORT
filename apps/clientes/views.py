from django.shortcuts import redirect, render
from django.contrib.auth.forms import AuthenticationForm
from django.contrib.auth import authenticate, login
from django.contrib import messages
from django.contrib.auth import login, logout
from django.contrib.auth import get_user_model
from .models import Cliente, Empleado, Prospecto
from apps.productos.models import Producto
from .forms import CustomEmpleadoCreationForm, nuevoClienteForm, nuevoProspectoForm

User = get_user_model()


def index_view(request):
    productos = Producto.objects.all()
    print(productos)

    return render(request, "index.html", { "productos": productos })

def registroView(request):

    if request.method == 'POST':
        form = nuevoProspectoForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect("/")
        else: 
            return render(request, 'nuevoProspecto.html', {'form': form})
    else:
        form = nuevoProspectoForm()
        return render(request, "registro.html", { "form": form })

def view_404(request, exception):
    return render(request, '404.html')

def login_view(request):
    form = AuthenticationForm()
    if request.user.is_authenticated:
        return redirect("/menu")

    if request.method == "POST":
        form = AuthenticationForm(data=request.POST)
        if form.is_valid():
            username = form.cleaned_data['username']
            password = form.cleaned_data['password']

            user = authenticate(username=username, password=password)

            if user is not None:
                login(request, user)
                return redirect('/menu')
        else:
            messages.error(request, "Usuario y/o contraseña incorrectos")
    return render(request, 'login.html', {'form': form})

def logout_method(request):
    logout(request)
    return redirect('/')

def admin_view(request):
    if request.user.is_authenticated:

        user = User.objects.filter(username=request.user).first()

        return render(request, "menu.html", {"User": user})
    else:
        return redirect("/login")

def vendedoresView(request):
    if request.method == "POST":
        pk = request.POST.get("pk")
        vendedor = Empleado.objects.filter(pk=pk).first()
        if vendedor != None:
            vendedor.delete()

    vendedores = Empleado.objects.filter(tipo="SE")
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        return render(request, 'vendedores.html', {"vendedores": vendedores, "User": user})
    else:
        return redirect('/menu')

def nuevoVendedorView(request):
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        if request.method == 'POST':
            form = CustomEmpleadoCreationForm(request.POST)
            if form.is_valid():
                form.save()
                return redirect("/vendedores")
            else: 
                return render(request, 'nuevoVendedor.html', {"User": user, 'form': form})
        else:
            form = CustomEmpleadoCreationForm()
            return render(request, 'nuevoVendedor.html', {"User": user, 'form': form})
    else:
        return redirect('/menu')

def editarVendedorView(request, pk):

    user = User.objects.filter(username=request.user).first()

    vendedor = Empleado.objects.filter(pk=pk).first()
    if user.tipo == 'MA':

        if request.method == "POST":
            form = CustomEmpleadoCreationForm(request.POST, instance=vendedor)
            if form.is_valid():
                form.save()
                return redirect("/vendedores")
            else:
                return render(request, 'nuevoVendedor.html', {"User": user, 'form': form})


        form = CustomEmpleadoCreationForm(instance=vendedor)
        return render(request, 'nuevoVendedor.html', {"User": user, 'form': form})
    else:
        return redirect('/menu')

def clientesView(request):

    if request.method == "POST":
        pk = request.POST.get("pk")
        cliente = Cliente.objects.filter(pk=pk).first()
        if cliente != None:
            cliente.delete()

    clientes = Cliente.objects.all().order_by("pk")
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        return render(request, 'clientes.html', {"clientes": clientes, "User": user})
    else:
        return redirect('/menu')

def nuevoClienteView(request):
    user = User.objects.filter(username=request.user).first()

    if user.tipo == 'MA':
        if request.method == 'POST':
            form = nuevoClienteForm(request.POST)
            if form.is_valid():
                form.save()
                return redirect("/clientes")
            else: 
                return render(request, 'nuevoCliente.html', {"User": user, 'form': form})
        else:
            form = nuevoClienteForm()
            return render(request, 'nuevoCliente.html', {"User": user, 'form': form})
    else:
        return redirect('/menu')

def editarClienteView(request, pk):
    user = User.objects.filter(username=request.user).first()

    cliente = Cliente.objects.filter(pk=pk).first()
    if user.tipo == 'MA':

        if request.method == "POST":
            form = nuevoClienteForm(request.POST, instance=cliente)
            if form.is_valid():
                form.save()
                return redirect("/clientes")
            else:
                return render(request, 'nuevoCliente.html', {"User": user, 'form': form})


        form = nuevoClienteForm(instance=cliente)
        return render(request, 'nuevoCliente.html', {"User": user, 'form': form})
    else:
        return redirect('/menu')

def prospectosView(request):
    if request.method == "POST":
        pk = request.POST.get("pk")
        prospecto = Prospecto.objects.filter(pk=pk).first()
        if prospecto != None:
            prospecto.delete()

    prospectos = Prospecto.objects.all().order_by("pk")
    user = User.objects.filter(username=request.user).first()

    return render(request, 'solicitudesContacto.html', {"prospectos": prospectos, "User": user})

def nuevoProspectoView(request):
    user = User.objects.filter(username=request.user).first()

    if request.method == 'POST':
        form = nuevoProspectoForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect("/prospectos")
        else: 
            return render(request, 'nuevoProspecto.html', {"User": user, 'form': form})
    else:
        form = nuevoProspectoForm()
        return render(request, 'nuevoProspecto.html', {"User": user, 'form': form})

def editarProspectoView(request, pk):
    user = User.objects.filter(username=request.user).first()

    prospecto = Prospecto.objects.filter(pk=pk).first()

    if request.method == "POST":
        form = nuevoProspectoForm(request.POST, instance=prospecto)
        if form.is_valid():
            form.save()
            return redirect("/prospectos")
        else:
            return render(request, 'nuevoProspecto.html', {"User": user, 'form': form})


    form = nuevoProspectoForm(instance=prospecto)
    return render(request, 'nuevoProspecto.html', {"User": user, 'form': form})