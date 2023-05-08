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

void afisare() { //processing + showing the first string from messages
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

  if (messages[0][2] == '1') { //emergency
    lcd.print("! ");
  }

  lcd.print("Camera : ");
  lcd.print(roomNumber);

  lcd.setCursor(0, 1);
  lcd.print(message);

  for (int i = 0; i < (messages[0][2] == '1' ? 80 : 4); i++) { //calling the buzzer on the next message, insisting if it is an emergency
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

    if (result[0] == '0') {//if it's a stop call -> show the next message (messages[0])
      if (messagesLength == 1) {//if we only have one message -> delete everything
        messages[0] = "";
      }

      for (int i = 1; i < messagesLength; i++) { //deleting the first message from our array, so the next one will now be messages[0]
        messages[i - 1] = messages[i];
      }
      messagesLength--;

      if (messagesLength > 0) { //if we have any more messages we show messages[0]
        afisare();
      } else {                  //else we clear the screen, turn off the LED and reset lcdFull
        lcd.clear();
        digitalWrite(lightPin, LOW);
        lcdFull = 0;
      }

    } else { //if it's a ON call -> we add it to the array
      if (result[2] == '1') { // emergency -> we prioritise it in the array and show it
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
