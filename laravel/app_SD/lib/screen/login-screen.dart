import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter_authentication_with_laravel_sanctum/providers/auth.dart';
import 'package:provider/provider.dart';

class LoginScreen extends StatefulWidget{

  @override
  State<StatefulWidget> createState() {
    return LoginState();
  }
}

class LoginState extends State<LoginScreen> {

  final _formKey = GlobalKey<FormState>();
  String _email;
  String _password;

  submit () {
    Provider.of<Auth>( context, listen: false ).login(
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
        title: Text('Iniciar Sesion'),
      ),
      body: Form(
        key: _formKey,
        child: Scrollbar(
          child: SingleChildScrollView(
            padding: EdgeInsets.all(16),
            child: Column(
              children: [
                TextFormField(
                  initialValue: 'al221910321@gmail.com',
                  decoration: InputDecoration(
                  labelText: 'Correo',
                    hintText: 'tucorreo@direccion.com',
                  ),
                  onSaved: (value) => {
                    _email = value
                  },
                ),
                TextFormField(
                  initialValue: 'password',
                  decoration: InputDecoration(
                    labelText: 'Contraseña',
                  ),
                  onSaved: (value) => {
                    _password = value
                  },
                ),
                SizedBox(
                  width: double.infinity,
                  child: FlatButton(
                    child: Text('Iniciar Sesion'),
                    onPressed: () {
                      _formKey.currentState.save();

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