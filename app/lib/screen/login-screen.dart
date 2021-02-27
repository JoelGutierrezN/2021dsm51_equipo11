import 'package:app/providers/auth.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

class LoginScreen extends StatefulWidget{
  @override
  State<StatefulWidget> createState(){
    return LoginState();
  }
}

class LoginState extends State<LoginScreen>{
  final _formkey = GlobalKey<FormState>();
  String _email;
  String _password;

  void submit () {
      Provider.of<Auth>(context, listen: false).login(
      credentials: {
        'email': _email,
        'password': _password,
        }
      );
      Navigator.pop(context);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Inicio de Sesion'),
      ),
      body: Form(
        key: _formkey,
        child: Scrollbar(
          child: SingleChildScrollView(
            padding: EdgeInsets.all(16),
            child: Column(
              children: [
                TextFormField(
                  initialValue: 'correo@correo.com',
                  decoration: InputDecoration(
                    labelText: 'Correo',
                    hintText: 'correo@correo.com',
                  ),
                  onSaved: (value) {
                    _email = value;
                  },
                ),
                TextFormField(
                  initialValue: 'password',
                  decoration: InputDecoration(
                    labelText: 'Contraseña',
                  ),
                  onSaved: (value) {
                    _password = value;
                  },
                ),
                SizedBox(
                  width: double.infinity,
                  child: FlatButton(
                    child: Text('Iniciar Sesion'),
                    onPressed: () {
                      _formkey.currentState.save();
                      this.submit();
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
}