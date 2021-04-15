import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:email_validator/email_validator.dart';

import '../dio.dart';
import '../models/user.dart';

class UserScreen extends StatefulWidget {
  final User user;

  UserScreen({Key key, this.user}) : super(key: key);

  @override
  _UserScreenState createState() => _UserScreenState();
}

class _UserScreenState extends State<UserScreen> {
  final _formKey = GlobalKey<FormState>();

  final List<String> _estadoUsuario = [
    'Activo',
    'Inactivo'
  ];

  final List<String> _rangoUsuario = [
    'Admin',
    'Empleado',
    'Usuario'
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        backgroundColor: Color(0xFFFF5722),
        title: Text((widget.user.id <= 0 ? 'Crear ' : 'Editar ') + 'Usuario'),
      ),    
        body: Form(
          key: _formKey,
          child: ListView(
            padding: EdgeInsets.symmetric(horizontal: 10.0, vertical: 20.0),
            children: <Widget>[
                _image(),
                Divider(),
                _inputNombre(),
                Divider(),
                _inputApellidos(),
                Divider(),
                _inputCorreo(),
                Divider(),
                _inputTelefono(),
                Divider(),
                _inputTelefonoFijo(),
                Divider(),
                _listaEstadoUsuario(),
                Divider(),
                _listaRangoUsuario(),
                Divider(),
                _boton()
              ],
            )
          ),  
      );
  }

   Widget _inputNombre() {
    return TextFormField(
      keyboardType: TextInputType.text,
      validator: (value){
        if (value.isEmpty) {
          return 'El Campo es obligatorio';
        }
        return null;
      },
      initialValue: widget.user.name,
      decoration: InputDecoration(
          border: OutlineInputBorder(borderRadius: BorderRadius.circular(20.0)),
          hintText: 'Nombre',
          labelText: 'Nombre',
          helperText: 'Nombre',
          suffixIcon: Icon(Icons.supervised_user_circle_outlined),
          icon: Icon(Icons.supervised_user_circle_rounded)),
      onChanged: (value) {
        widget.user.name = value;
      },
    );
  }

  Widget _inputApellidos() {
    return TextFormField(
      keyboardType: TextInputType.text,
      validator: (value){
        if (value.isEmpty) {
          return 'El campo es obligatorio';
        }
        return null;
      },
      // autofocus: true,
      initialValue: widget.user.firstName,
      decoration: InputDecoration(
          border: OutlineInputBorder(borderRadius: BorderRadius.circular(20.0)),
          hintText: 'Apellido(s)',
          labelText: 'Apellido(s)',
          helperText: 'Apellido(s)',
          suffixIcon: Icon(Icons.keyboard),
          icon: Icon(Icons.keyboard)),
      onChanged: (value) {
        widget.user.firstName = value;
      },
    );
  }

  Widget _image() {
    if(widget.user.id != 0){
      return Container(
        child: Image.network('http://safetydogs.online/laravel/storage/app/users/'+widget.user.img.toString(), width: 100, height: 100,)
      );
    }else{
      return Container(
      child: Image.network('http://safetydogs.online/laravel/storage/app/users/user.png', width: 100, height: 100,)
    );
    }
  }

  Widget _inputCorreo() {
    return TextFormField(
      initialValue: widget.user.email,
      keyboardType: TextInputType.emailAddress,
      validator: (value) {
        final bool validador = EmailValidator.validate(value);
        if (validador == false) {
          return 'Ingresa una Direccion de Correo valida';
        }
        if (value.isEmpty) {
          return 'Ingresa una direccion de Correo';
        }
        return null;
      },
      decoration: InputDecoration(
        labelText: 'Correo',
        hintText: 'Correo',
        helperText: 'Correo',
        suffixIcon: Icon(Icons.email_outlined),
        border: OutlineInputBorder(
          borderRadius: BorderRadius.circular(20.0)
        ), 
        icon: Icon(Icons.email_rounded)
      ),
      onChanged: (value) {
        widget.user.email = value;
      },
    );
  }

  Widget _inputTelefono() {
    return TextFormField(
      initialValue: widget.user.cellphone,
      keyboardType: TextInputType.number,
      validator: (value){
        if (value.isEmpty) {
          return 'El campo es obligatorio';
        }
        if (value.length < 10) {
          return 'El numero es incorrecto y es necesario';
        }
        return null;
      },
      decoration: InputDecoration(
        labelText: 'Numero Celular',
        hintText: 'Numero Celular',
        helperText: 'Numero Celular',
        suffixIcon: Icon(Icons.phone_android),
        border: OutlineInputBorder(
          borderRadius: BorderRadius.circular(20.0)
        ), 
        icon: Icon(Icons.phone_android)
      ),
      onChanged: (value) {
        widget.user.cellphone = value;
      },
    );
  }

  Widget _inputTelefonoFijo() {
    return TextFormField(
      initialValue: widget.user.phone,
      keyboardType: TextInputType.number,
      decoration: InputDecoration(
        labelText: 'Numero Telefonico',
        hintText: 'Numero Telefonico',
        helperText: 'Numero Telefonico',
        suffixIcon: Icon(Icons.phone_enabled),
        border: OutlineInputBorder(
          borderRadius: BorderRadius.circular(20.0)
        ), 
        icon: Icon(Icons.phone_enabled)
      ),
      onChanged: (value) {
        widget.user.phone = value;
      },
    );
  }

  List<DropdownMenuItem<String>> _getEstadoUsuario() {
    List<DropdownMenuItem<String>> lista = List();
    _estadoUsuario.forEach((estado) {
      lista.add(DropdownMenuItem(child: Text(estado), value: estado));
    });
    return lista;
  }

  List<DropdownMenuItem<String>> _getRangoUsuario() {
    List<DropdownMenuItem<String>> lista = List();
    _rangoUsuario.forEach((rango) {
      lista.add(DropdownMenuItem(child: Text(rango), value: rango));
    });
    return lista;
  }

  String _getEstadoActual(){
    if(widget.user.active == 1){
      return 'Activo';
    }else{
      return 'Inactivo';
    }
  }

  void _asignarEstadoUsuario(value){
    if (value == "Activo")
      widget.user.active = 1;
    else
      widget.user.active = 0;
  }

  Widget _listaEstadoUsuario() {
    return DropdownButtonFormField(
      value: _getEstadoActual(), 
      items: _getEstadoUsuario(),
      decoration: InputDecoration(
          border: OutlineInputBorder(borderRadius: BorderRadius.circular(20.0)),
          hintText: 'Estado de Cuenta',
          labelText: 'Estado de Cuenta',
          helperText: 'Estado de Cuenta',
          suffixIcon: Icon(Icons.lock_open),
          icon: Icon(Icons.lock)
      ),
      onChanged: (value) {
        _asignarEstadoUsuario(value);
      },
    );
  }

  Widget _listaRangoUsuario() {
    return DropdownButtonFormField(
      validator: (value){
        if (value.isEmpty) {
          return 'El campo es obligatorio';
        }
        return null;
      },
      value: widget.user.rank, 
      items: _getRangoUsuario(),
      decoration: InputDecoration(
          border: OutlineInputBorder(borderRadius: BorderRadius.circular(20.0)),
          hintText: 'Nivel de Cuenta',
          labelText: 'Nivel de Cuenta',
          helperText: 'Nivel de Cuenta',
          suffixIcon: Icon(Icons.support_agent_sharp),
          icon: Icon(Icons.support_agent_sharp)
      ),
      onChanged: (value) {
        widget.user.rank = value;
      },
    );
  }

   Widget _boton() {
    return SizedBox(
      width: double.infinity,
      child: TextButton(
        child: Text('guardar'),
        onPressed: () {
          if (_formKey.currentState.validate()) {
            //_formKey.currentState.save();
            _submit();
          }
        },
      ),
    );
  }

  void _alerta(BuildContext context, String titulo, String mensaje) {
    showDialog(
        context: context,
        builder: (context) {
          return AlertDialog(
            shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.circular(20.0)),
            title: Text(titulo),
            content: Column(
              mainAxisSize: MainAxisSize.min,
              children: <Widget>[
                Text(mensaje),
                // FlutterLogo(size: 100.0),
              ],
            ),
            actions: <Widget>[
              TextButton(
                child: Text('Aceptar'),
                onPressed: () {
                  Navigator.of(context).pop();
                },
              )
            ],
          );
        });
  }

  void _submit() async {
    if (0 >= widget.user.id) {
      //crear, no existe
      Dio.Response response = await dio().post('usuarios',
          data: json.encode(widget.user.toJson()),
          options: Dio.Options(headers: {'auth': true}));
      if (200 == response.statusCode) {
        _alerta(context, 'Usuario', 'Usuario creado');
      }
    } else {
      //actualizar
      Dio.Response response = await dio().put(
          'usuarios/' + widget.user.id.toString(),
          data: json.encode(widget.user.toJson()),
          options: Dio.Options(headers: {'auth': true}));
      if (200 == response.statusCode) {
        _alerta(context, 'Usuario', 'Usuario actualizado');
      }
    }

    // Navigator.pop(context); //regresar a pantalla previa
    // return true;
  }
}
