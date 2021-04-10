
import 'dart:convert';

import 'package:app/models/room.dart';
import 'package:flutter/material.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:email_validator/email_validator.dart';

import '../dio.dart';

class RentRoomScreen extends StatefulWidget{

  final Room room;
  RentRoomScreen({Key key, this.room}): super(key: key);

  @override
  State<StatefulWidget> createState(){
    return RentRoomState();
  }
}

class RentRoomState extends State<RentRoomScreen>{

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
                _boton()
              ],
            )
          ),  
      );
  }


  Widget _image() {
    if(widget.room.id != 0){
      return Container(
        child: Image.network('http://safetydogs.online/laravel/storage/app/users/'+widget.room.img.toString(), width: 100, height: 100,)
      );
    }else{
      return Container(
      child: Image.network('http://safetydogs.online/laravel/storage/app/users/room.png', width: 100, height: 100,)
    );
    }
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
        'id': widget.room.id,
        'name': _name,
        'first_name': _firstName,
        'email': _email,
        'cellphone': _cellphone,
        'phone': _phone,
        'rank': widget.room.rank,
        'newpassword': _newpassword,
        'password': _password,
        'confirm_password': _confirmPassword
      };

      print(json.encode(credentials));

      Dio.Response response = await dio().put('usuarios/'+widget.room.id.toString(),
          data: json.encode(credentials),
          options: Dio.Options(headers: {'auth': true}));
          print(response.toString());
      if (200 == response.statusCode) {
        _alerta(context, 'SafetyDogs', '$response');
      }
  }
}