
import 'dart:convert';

import 'package:app/models/user.dart';
import 'package:flutter/material.dart';
import 'package:dio/dio.dart' as Dio;
import 'package:email_validator/email_validator.dart';

import '../dio.dart';

class PremiumScreen extends StatefulWidget{

  final User user;
  PremiumScreen({Key key, this.user}): super(key: key);

  @override
  State<StatefulWidget> createState(){
    return PremiumState();
  }
}

class PremiumState extends State<PremiumScreen>{

  final _formkey = GlobalKey<FormState>();
  String _id;
  String _card;
  String _cvv;
  String _date;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        backgroundColor: Color(0xFFFF5722),
        title: Text('Rentar Membresia Premium'),
      ),    
        body: Form(
          key: _formkey,
          child: ListView(
            padding: EdgeInsets.symmetric(horizontal: 10.0, vertical: 20.0),
            children: <Widget>[
                _inputCard(),
                Divider(),
                _inputDate(),
                Divider(),
                _inputCvv(),
                Divider(),
                _boton()
              ],
            )
          ),  
      );
  }

   Widget _inputCard() {
    return TextFormField(
      keyboardType: TextInputType.number,
      validator: (value){
        if (value.isEmpty) {
          return 'El Campo es obligatorio';
        }
        return null;
      },
      decoration: InputDecoration(
          border: OutlineInputBorder(borderRadius: BorderRadius.circular(20.0)),
          hintText: 'Numero de Tarjeta',
          labelText: '0000-0000-0000-0000',
          helperText: 'Numero de Tarjeta',
          suffixIcon: Icon(Icons.supervised_user_circle_outlined),
          icon: Icon(Icons.supervised_user_circle_rounded)),
      onChanged: (value) {
        _card = value;
      },
    );
  }

  Widget _inputDate() {
    return TextFormField(
      keyboardType: TextInputType.number,
      validator: (value){
        if (value.isEmpty) {
          return 'El Campo es obligatorio';
        }
        return null;
      },
      decoration: InputDecoration(
          border: OutlineInputBorder(borderRadius: BorderRadius.circular(20.0)),
          hintText: 'Fecha de Vencimiento',
          labelText: '05-10',
          helperText: 'Fecha de Vencimiento',
          suffixIcon: Icon(Icons.supervised_user_circle_outlined),
          icon: Icon(Icons.supervised_user_circle_rounded)),
      onChanged: (value) {
        _date = value;
      },
    );
  }

  Widget _inputCvv() {
    return TextFormField(
      keyboardType: TextInputType.number,
      validator: (value){
        if (value.isEmpty) {
          return 'El Campo es obligatorio';
        }
        return null;
      },
      decoration: InputDecoration(
          border: OutlineInputBorder(borderRadius: BorderRadius.circular(20.0)),
          hintText: 'Cvv',
          labelText: '000',
          helperText: 'Cvv',
          suffixIcon: Icon(Icons.supervised_user_circle_outlined),
          icon: Icon(Icons.supervised_user_circle_rounded)),
      onChanged: (value) {
        _cvv = value;
      },
    );
  }

   Widget _boton() {
    return SizedBox(
      width: double.infinity,
      child: TextButton(
        child: Text('Proceder al Pago'),
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
        'card': _card,
        'date': _date,
        'cvv': _cvv
      };

      print(json.encode(credentials));

      Dio.Response response = await dio().post('app/premium',
          data: json.encode(credentials),
          options: Dio.Options(headers: {'auth': true}));
          print(response.toString());
      if (200 == response.statusCode) {
        _alerta(context, 'SafetyDogs', '$response');
      }
  }
}