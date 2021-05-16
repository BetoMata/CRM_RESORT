from django.contrib import admin
from django.contrib.auth.admin import UserAdmin
from .forms import CustomUserCreationForm, CustomUserChangeForm
from .models import Cliente, Empleado


class EmpleadoAdmin(UserAdmin):
    add_form = CustomUserCreationForm
    form = CustomUserChangeForm
    model = Empleado
    list_display = ('username', 'nombre', 'apellido', 'telefono', 'email', 'status', 'tipo', 'is_staff', 'is_active',)
    list_filter = ('username', 'nombre', 'apellido', 'telefono', 'email', 'status', 'tipo', 'is_staff', 'is_active',)
    fieldsets = (
        (None, {'fields': ('username', 'password', 'nombre', 'apellido', 'telefono', 'email', 'status', 'tipo')}),
        ('Permissions', {'fields': ('is_staff', 'is_active')}),
    )
    add_fieldsets = (
        (None, {
            'classes': ('wide',),
            'fields': ('username', 'nombre', 'apellido', 'telefono', 'email', 'status', 'tipo', 'password1', 'password2', 'is_staff', 'is_active')}
        ),
    )
    search_fields = ('username',)
    ordering = ('username',)


admin.site.register(Cliente)
admin.site.register(Empleado, EmpleadoAdmin)