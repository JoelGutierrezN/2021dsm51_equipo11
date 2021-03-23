
import 'package:flutter/material.dart';


class RegisterScreen extends StatefulWidget{
  @override
  State<StatefulWidget> createState(){
    return RegisterState();
  }
}

class RegisterState extends State<RegisterScreen>{
  final _formkey = GlobalKey<RegisterState>();
  String _name;
  String _first_name;
  String _email;
  String _password;
  String _confirmpassword;

  void submit () {
      Navigator.pop(context);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFFFFF3E0),
      appBar: AppBar(
        title: Text('Crear Cuenta en SafetyDogs'),
        backgroundColor: Color(0xFFFF5722),
      ),
      body: Form(
        key: _formkey,
        child: Scrollbar(
          child: SingleChildScrollView(
            padding: EdgeInsets.all(16),
            child: Column(
              children: [
                TextFormField(
                  decoration: InputDecoration(
                    labelText: 'Nombre',
                    hintText: 'Ej. Joel',
                    icon: Icon(Icons.supervised_user_circle)
                  ),
                  onSaved: (value) {
                    _name = value;
                  },
                ),
                TextFormField(
                  decoration: InputDecoration(
                    labelText: 'Apellido',
                    hintText: 'Ej. Gutierrez',
                    icon: Icon(Icons.switch_account)
                  ),
                  onSaved: (value) {
                    _first_name = value;
                  },
                ),
                TextFormField(
                  decoration: InputDecoration(
                    labelText: 'email',
                    hintText: 'Ej. correo@corre.com',
                    icon: Icon(Icons.email)
                  ),
                  onSaved: (value) {
                    _email = value;
                  },
                ),
                TextFormField(
                  decoration: InputDecoration(
                    labelText: 'contraseña',
                    hintText: 'Ej. password',
                    icon: Icon(Icons.vpn_key_rounded)
                  ),
                  onSaved: (value) {
                    _password = value;
                  },
                ),
                TextFormField(
                  decoration: InputDecoration(
                    labelText: 'Confimrar Contraseña',
                    hintText: 'Ej. password',
                    icon: Icon(Icons.vpn_key_rounded)
                  ),
                  onSaved: (value) {
                    _confirmpassword = value;
                  },
                ),
                SizedBox(
                  width: double.infinity,
                  child: FlatButton(
                    child: Text('Registrar Ahora'),
                    onPressed: () {},
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