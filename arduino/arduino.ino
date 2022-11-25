#include <LiquidCrystal.h>

const int rs = 7, en = 8, d4 = 9, d5 = 10, d6 = 11, d7 = 12;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);


int lightPin = 4, buzzerPin = 13; //okPin will be 1 after the first space is met, okRoom will be 1 after the second space
String messages[50];
int messagesLength = 0, lcdFull = 0;

void setup() {
  pinMode(lightPin, OUTPUT);
  pinMode(buzzerPin, OUTPUT);
  Serial.begin(9600);

  lcd.begin(16, 2);
}

void afisare() { //prelucreaza + afiseaza primul string din messages
  String result = messages[0];
  String message = "";
  int roomNumber = 0;
  int okRoom = 0;
  bool urgenta = messages[0][2];

  lcd.clear();

  for (int i = 4; i < result.length(); i++) {
    if (result[i] == ' ' && !okRoom)
      okRoom = 1, i++;
    if (!okRoom)
      roomNumber = roomNumber * 10 + (result[i] - '0');
    else
      message += result[i];
  }

  digitalWrite(lightPin, HIGH);
  lcd.setCursor(0, 0);

  if (messages[0][2] == '1') { //urgenta
    lcd.print("! ");
  }

  lcd.print("Camera : ");
  lcd.print(roomNumber);

  lcd.setCursor(0, 1);
  lcd.print(message);

  for (int i = 0; i < (messages[0][2] == '1' ? 80 : 4); i++) { //sa sune la urm mesaj, sa insiste la urgente
    digitalWrite(buzzerPin, HIGH);
    if (messages[0][2] == '1')
      digitalWrite(lightPin, HIGH);
    delay(50);
    if (messages[0][2] == '1')
      digitalWrite(lightPin, LOW);
    digitalWrite(buzzerPin, LOW);
    delay(50);
  }
}

void loop() {
  while (Serial.available() == 0) {}

  String result = Serial.readString();
  result.trim();
  if (result[0] == '1') {
    messages[messagesLength] = result;
    messagesLength = messagesLength + 1;
    afisare();
    lcdFull = 1;
  }
  lcd.setCursor(0, 0);

  while (lcdFull) {
    while (Serial.available() == 0) {}
    String result = Serial.readString();
    result.trim();
    lcd.setCursor(0, 0);

    if (result[0] == '0') {//daca e apel de oprire -> afisam urm mesaj (messages[0])
      if (messagesLength == 1) {//daca avem un singur mesaj - stergem tot
        messages[0] = "";
      }

      for (int i = 1; i < messagesLength; i++) { //stergem primul mesaj din lista, ca urm sa fie messages[0]
        messages[i - 1] = messages[i];
      }
      messagesLength--;

      if (messagesLength > 0) { //daca mai avem mesaje afisam messages[0]
        afisare();
      } else {                  //daca nu mai avem mesaje stergem ce e pe ecran, inchidem becul si resetam lcdFull
        lcd.clear();
        digitalWrite(lightPin, LOW);
        lcdFull = 0;
      }

    } else { //daca e apel de call -> il adaugam in lista
      if (result[2] == '1') { // urgenta -> o adaugam prima in lista si o afisam
        messagesLength = messagesLength + 1;
        for (int i = messagesLength; i > 0; i--)
          messages[i] = messages[i - 1];
        messages[0] = result;
        afisare();
      } else {
        messages[messagesLength] = result;
        messagesLength = messagesLength + 1;
      }
    }
  }
}
