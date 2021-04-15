import 'package:app/providers/auth.dart';
import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:email_validator/email_validator.dart';

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
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        title: Text('Inicio de Sesion'),
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
                  obscureText: true,
                  validator: (value) {
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
                SizedBox(
                  width: double.infinity,
                  child: FlatButton(
                    child: Text('Iniciar Sesion'),
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
}