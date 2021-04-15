
import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:email_validator/email_validator.dart';

import '../dio.dart';
import '../main.dart';

class RegisterScreen extends StatefulWidget{
  @override
  State<StatefulWidget> createState(){
    return RegisterState();
  }
}

class RegisterState extends State<RegisterScreen>{
  final _formkey = GlobalKey<FormState>();
  String _name;
  String _firstName;
  String _email;
  String _cellphone;
  String _password;
  String _confirmPassword;
  var _confirmpass;

  void submit () async {
      Map credentials = {
        'name': _name,
        'first_name': _firstName,
        'email': _email,
        'cellphone': _cellphone,
        'password': _password,
        'confirm_password': _confirmPassword
      };

      Dio.Response response = await dio().post('app/registrar',
          data: json.encode(credentials),
          options: Dio.Options(headers: {'auth': true}));
          print(response.toString());
      if (200 == response.statusCode) {
        _alerta(context, 'SafetyDogs', '$response');
      }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        title: Text('Registrar'),
        backgroundColor: Color(0xFFFF5722),
      ),
      body: Form(
        key: _formkey,
        child: Scrollbar(
          child: SingleChildScrollView(
            padding: EdgeInsets.all(20),
            child: Column(
              children: [
                TextFormField(
                  keyboardType: TextInputType.text,
                  validator: (value) {
                    if (value.isEmpty) {
                      return 'El nombre es obligatorio';
                    }
                    return null;
                  },
                  decoration: InputDecoration(
                    labelText: 'Nombre',
                    hintText: 'Nombre',
                    helperText: 'nombre',
                    suffixIcon: Icon(Icons.supervised_user_circle_outlined),
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(20.0)
                    ), 
                    icon: Icon(Icons.supervised_user_circle)
                  ),
                  onSaved: (value) {
                    _name = value;
                  },
                ),
                TextFormField(
                  keyboardType: TextInputType.text,
                  validator: (value) {
                    if (value.isEmpty) {
                      return 'El o los Apellidos son obligatorios';
                    }
                    return null;
                  },
                  decoration: InputDecoration(
                    labelText: 'Apellido(s)',
                    hintText: 'Apellido(s)',
                    helperText: 'Apellidos(s)',
                    suffixIcon: Icon(Icons.text_format_outlined),
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(20.0)
                    ), 
                    icon: Icon(Icons.text_format_rounded)
                  ),
                  onSaved: (value) {
                    _firstName = value;
                  },
                ),
                TextFormField(
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
                ),
                TextFormField(
                  keyboardType: TextInputType.number,
                  validator: (value) {
                    if (value.isEmpty) {
                      return 'El numero telefonico es oblgatorio';
                    }
                    return null;
                  },
                  decoration: InputDecoration(
                      hintText: 'Numero Celular',
                      labelText: 'Numero Celular',
                      helperText: 'Numero Celular',
                      suffixIcon: Icon(Icons.phone_android_outlined),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.circular(20.0)
                      ), 
                      icon: Icon(Icons.phone_android)
                  ),
                  onSaved: (value) {
                    _cellphone = value.toString();
                  },
                ),
                TextFormField(
                  obscureText: true,
                  validator: (String value) {
                    _confirmpass = value;
                    if (value.isEmpty) {
                      return 'La contraseña es obligatoria';
                    }
                    return null;
                  },
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
                ),
                TextFormField(
                  obscureText: true,
                  validator: (value) {
                    if (value.isEmpty) {
                      return 'Confirma tu contraseña';
                    }
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
                ),
                SizedBox(
                  width: double.infinity,
                  child: FlatButton(
                    child: Text('Registrar Ahora'),
                    onPressed: () {
                      if (_formkey.currentState.validate()) {
                        _formkey.currentState.save();
                        this.submit();
                      }
                    },
                  ),
                ),
              ],
            ),
          ),
        ),
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
            title: Text(titulo,
            textAlign: TextAlign.center,
            style: TextStyle(
                  color: Colors.orange[700],
                  fontFamily: 'Satisfy'
              ),
            ),
            content: Column(
              mainAxisSize: MainAxisSize.min,
              children: <Widget>[
                Text(mensaje,
                textAlign: TextAlign.center,
                ),
                // FlutterLogo(size: 100.0),
              ],
            ),
            actions: <Widget>[
              TextButton(
                child: Text('OK'),
                onPressed: () {
                  Navigator.push(context, MaterialPageRoute(builder: (context) => MyApp()));
                },
              )
            ],
          );
        });
  }
}