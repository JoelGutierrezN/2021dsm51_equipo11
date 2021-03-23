import 'package:flutter/material.dart';

class PremiumScreen extends StatefulWidget{
  @override
  State<StatefulWidget> createState(){
    return PremiumState();
  }
}

class PremiumState extends State<PremiumScreen>{
  final _formkey = GlobalKey<PremiumState>();
  String _card;
  String _paypal_account;
  String _date;
  String _invoice;
  String _ownerName;
  String _cvv;
  String _dateCard;

  void submit () {
      Navigator.pop(context);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        title: Text('Rentar Membresia Premium'),
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
                    labelText: 'Tarjeta de Debito/credito',
                    hintText: 'Ej. 1254-5484-2745-2557',
                    icon: Icon(Icons.credit_card)
                  ),
                  onSaved: (value) {
                    _card = value;
                  },
                ),
                Row(
                  children: <Widget>[
                    Expanded(
                      child: TextFormField(
                        decoration: InputDecoration(
                          hintText: '05/30',
                          icon: Icon(Icons.date_range)
                        ),
                        onSaved: (value) {
                          _dateCard = value;
                        },
                      ), 
                    ),
                    Expanded(
                      child: TextFormField(
                        decoration: InputDecoration(
                          hintText: 'CVV',
                          icon: Icon(Icons.credit_card_rounded)
                        ),
                        onSaved: (value) {
                          _cvv = value;
                        },
                      ), 
                    ),
                  ],
                ),
                TextFormField(
                  decoration: InputDecoration(
                    labelText: 'Titular de la tarjeta',
                    hintText: 'Ej. Joel Gutierrez Nuñez',
                    icon: Icon(Icons.supervised_user_circle_outlined)
                  ),
                  onSaved: (value) {
                    _ownerName = value;
                  },
                ),
                SizedBox(
                  width: double.infinity,
                  child: TextButton(
                    child: Text('Proceder a Pagar'),
                    onPressed: () {},
                  ),
                ),
                SizedBox(
                  child: Text('o')
                ),
                Divider( height: 20,),
                SizedBox(
                  width: double.infinity,
                  child: TextButton(
                    onPressed: () {},
                    child: Column(
                      children: <Widget>[
                        Text.rich(
                          TextSpan(
                            children: <TextSpan>[
                              TextSpan(
                                text: 'Pagar con '
                              ),
                              TextSpan(
                                text: 'Pay',
                                style: TextStyle(
                                  color: Colors.blue[900]
                                ),
                              ),
                              TextSpan(
                                text: 'Pal',
                                style: TextStyle(
                                  color: Colors.blue[500]
                                ),
                              ),
                            ],
                          ),
                        )    
                      ],
                    ),
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