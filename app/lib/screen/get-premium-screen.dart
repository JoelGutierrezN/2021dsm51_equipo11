
import 'dart:convert';

import 'package:app/models/user.dart';
import 'package:flutter/material.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:email_validator/email_validator.dart';

import '../dio.dart';

class GetPremiumScreen extends StatefulWidget{

  final User user;
  GetPremiumScreen({Key key, this.user}): super(key: key);

  @override
  State<StatefulWidget> createState(){
    return GetPremiumState();
  }
}

class GetPremiumState extends State<GetPremiumScreen>{

  final _formkey = GlobalKey<FormState>();
  String _name;
  String _firstName;
  String _email;
  String _cellphone;
  String _phone;
  String _password;
  String _newpassword;
  String _confirmPassword;
  var _confirmpass;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        backgroundColor: Color(0xFFFF5722),
        title: Text('Mi Perfil'),
      ),    
        body: Form(
          key: _formkey,
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
                Text('Cambiar Contraseña'),
                Divider(),
                _inputPassword(),
                Divider(),
                _inputNewPassword(),
                Divider(),
                _inputConfirmPassword(),
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
        _name = value;
        print(value.toString());
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
      onSaved: (value) {
        _firstName = value;
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
      onSaved: (value) {
        _email = value;
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
      onSaved: (value) {
        _cellphone = value;
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
      onSaved: (value) {
        _phone = value;
      },
    );
  }

  Widget _inputPassword(){
    return TextFormField(
      obscureText: true,
      decoration: InputDecoration(
        labelText: 'Contraseña',
        hintText: 'Contraseña',
        helperText: 'Contraseña',
          suffixIcon: Icon(Icons.lock_open),
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(20.0)
          ), 
          icon: Icon(Icons.lock)
      ),
      onSaved: (String value) {
        _password = value;
      },
    );
  }    

  Widget _inputNewPassword(){
    return TextFormField(
      obscureText: true,
      validator: (String value) {
        _confirmpass = value;
        return null;
      },
      decoration: InputDecoration(
        labelText: 'Nueva Contraseña',
        hintText: 'Nueva Contraseña',
        helperText: 'Nueva Contraseña',
          suffixIcon: Icon(Icons.lock_open),
          border: OutlineInputBorder(
            borderRadius: BorderRadius.circular(20.0)
          ), 
          icon: Icon(Icons.lock)
      ),
      onSaved: (String value) {
        _newpassword = value;
      },
    );
  }            
  
  Widget _inputConfirmPassword() {
    return TextFormField(
          obscureText: true,
          validator: (value) {
            if (value != _confirmpass) {
              return "Tu contraseña no coincide con la de arriba";
            }
            return null;
          },
          decoration: InputDecoration(
            labelText: 'Confirmar Contraseña',
            hintText: 'Confirmar Contraseña',
            helperText: 'Cofirmar Contraseña',
              suffixIcon: Icon(Icons.lock_open),
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(20.0)
              ), 
              icon: Icon(Icons.lock)
          ),
          onSaved: (value) {
            _confirmPassword = value;
          },
        );
  }

   Widget _boton() {
    return SizedBox(
      width: double.infinity,
      child: TextButton(
        child: Text('Guardar Cambios'),
        onPressed: () {
          if (_formkey.currentState.validate()) {
            _formkey.currentState.save();
            submit();
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
        }
      );
  }

  void submit() async {
      Map credentials = {
        'id': widget.user.id,
        'name': _name,
        'first_name': _firstName,
        'email': _email,
        'cellphone': _cellphone,
        'phone': _phone,
        'rank': widget.user.rank,
        'newpassword': _newpassword,
        'password': _password,
        'confirm_password': _confirmPassword
      };

      print(json.encode(credentials));

      Dio.Response response = await dio().put('usuarios/'+widget.user.id.toString(),
          data: json.encode(credentials),
          options: Dio.Options(headers: {'auth': true}));
          print(response.toString());
      if (200 == response.statusCode) {
        _alerta(context, 'SafetyDogs', '$response');
      }
  }
}