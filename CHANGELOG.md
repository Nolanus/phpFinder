## Changelog "Web-File Manager"/"phpFinder"

### Version 0.905 (27.09.2014)
- Fixed: Änderungen von Checkbox Werten in den Einstellungen wurden nicht übernommen
- Fixed: Boolean constanten alle lowercase im config file, doppelte Semikolons am Zeilenende in generierter config Datei

### Version 0.9 (06.07.2013)
- New: Entpacken von zip, gzip und bzip2 Archiv-Dateien
- New: Konvertieren von Bildern zwischen GIF, JPG/JPEG, PNG und WebP
- New: Suchen von Dateien und Ordnern
- New: Farben des Interfaces einstellbar sowie Option, Rahmenlinien zeichnen zu lassen
- Improved: MD5-Summe von großen Dateien wird nicht mehr automatisch berechnet, um lange Wartezeiten und unnütige Serverlast zu vermeiden
- Improved: Alle Bilder in CSS-Sprite zusammengefasst
- Improved: Option, Web-File Manager Dateien in der Dateiliste auszublenden
- Improved: Einigen Code zusammengefasst, um Wiederholungen zu vermeiden und Platz einzusparen
- Fixed: bit.ly URL Shortener durch goo.gl ersetzt; kl.am entfernt (Dienst eingestellt)
- Fixed: Fehlerhafter Dateiname Parameter bei Schwarz-Weiß Filter
- Fixed: Löschen der Einstellungs-Datei war nur möglich, wenn diese den Standard-Namen besaß
- Fixed: Nutzung via sicherer https-Verbindung sollte nun möglich sein
- Fixed: Fehlerhafte Beschriftung der Seiten bei der Miniaturansicht Erzeugung
- Fixed: Nicht escapen der Dateinamen, wenn diese ausgegeben werden; Umgang mit gpc magic quotes
- Fixed: Einige wenige CSS Fixes für den IE

### Version 0.862 (05.01.12)
- Fixed: Buttons die halb unter dem Footer verschwunden sind
- Fixed: Fehler beim Ordner-Umbennen aufgrund nicht gesetzter Variablen (Danke an boeck)

### Version 0.861 (20.04.10)
- New: Ausrichtung der Ordner-Count einstellbar
- New: Prüfung auf Kompatibilität der Konfigurationsdatei
- New: Importieren von mehreren Dateien gleichzeitig
- New: Einstellbare Schriftgröße
- Improved: Einstellungseingaben die Zahlen erfordern werden nun gefilteret
- Fixed: Config-Datei-Fehlermeldung wurde immer angezeigt, egal ob die Option aktiviert war
- Fixed: Anzeigefehler des Einstellungsdialogs bei Anführungszeichen in den Einstellungswerten;

### Version 0.86 (02.04.10)
- New: CHMOD-Funktion (re)integriert
- New: Einstellungen zum Ändern des Verhaltens und Aussehens von WFM via Browser
- New: WFM-Dateien (Haupt- und Config-Datei) haben nun eine eigene "Datei bearbeiten" Seite
- New: Funktion zum Auflisten von Ordnerinhalten
- New: Option, bestimmte Dateiendungen auf die "Bearbeiten-Erlaubt"-Liste zu setzen
- Improved: Countdown bis zum automatischen Logout ist nun dank JavaScript aktiv
- Improved: Icon zum Externen Aufrufen von Dateien bzw. Bearbeiten von Ordnern ist nun rechts vom Dateinamen
- Improved: Beim New-File-Wizard kann man nun direkt die Weiterleitungs-URL angeben
- Improved: Zurück-Button im Datei-Ansehen Dialog
- Improved: Neues Hilfe und Supportsystem
- Improved: Position der "x Ordner und x Dateien" Anzeige nun einstellbar (via Einstellungen)
- Fixed: Fehler, der es trotz Änderung in den Einstellungen nur zuließ, 5 Dateien hochzuladen
- Fixed: Neue Links da neue Domain der WFM Seiten
- Fixed: Leere Ausgabe bei fehlenden Bildmaßen
- Fixed: Zeitzone des Servers lässt sich manuell festlegen
- Fixed: Problem mit langen Dateinamen, die die Datei-Ordner-Übersicht zu breit werden ließen
- Fixed: Rückimport des Bildes von Pixlr verwendete nicht den richtigen Zielordner

### Version 0.85 (04.11.09)
- New: Funktion zum Drehen von Bildern mit PHP
- New: Dateien und Ordner werden nun alphabetisch sortiert
- New: KurzURLs für Dateien erstellen
- New: New-File-Wizard: Ermöglicht es eine neue Datei automatisch mit bestimmten Inhalt zu füllen (z.B.: phpinfo, redirect, ...)
- New: Dateien via E-Mail-Anhang versenden
- New: Möglichkeit Bilder in verschiedenen Arten zu bearbeiten (Filter, Größe, Drehen)
- New: Import von entfernten Dateien auf einem FTP-Server
- New: Server-Test der prüft wie geeignet die aktuelle Serverkonfiguration für Web-File Manager ist
- Improved: Verarbeitung des Problems wenn der Anzuzeigende Ordner nicht mehr vorhanden ist
- Improved: Weitere Ersetzungsregeln beim Ersetzen von Falschen Umlauten beim Bearbeiten von Dateien
- Improved: Neben den Fehlermeldungen von WFM werden nun teilweise auch die PHP Fehlermeldungen zur besseren Ursachenforschung angezeigt
- Improved: Fehlermeldung falls beim Kopieren von Dateien der Zielordner nicht schreibbar ist
- Improved: Meldung bei angeblicher Formularabsendung, jedoch kein Formular angekommen ist
- Improved: Meldung beim Aufrufen einer nicht vorhandenen Aktion (action)
- Improved: Aktionen im Datei bearbeiten Dialog nun Zweispaltig aufgeteilt
- Improved: Es ist nun nicht mehr möglich Dateien oder Ordner trotz Fehlermeldung wegen nicht vorhandener Schreibrechte zu erstellen
- Fixed: Falsche Anzeige des Bearbeiten Dialogs durch die Überarbeitung des Formular Designs
- Fixed: Dateien und Ordner mit RFC1738 Speiziallzeichen (etwa "%20") konnten nicht bearbeitet werden
- Fixed: Fehlerhafte Hintergrundfarben Reihenfolge im Detail-Dialog von Bildern
- Fixed: Unmengen an Fehlermeldungen falls man eine nicht mehr vorhandene Text-Datei bearbeiten möchte
- Fixed: Dateien in Unterordner konnten nicht in einen weiteren Unterordner kopiert werden
- Fixed: Rechtschreibfehler
- Fixed: Keine Icons auf der Server Informations Seite
- Fixed: Zu lange Ordnernamen verdrängten die Haupticons
- Fixed: Abgebrochene lange Ordnernamen in Formularen
- Fixed: Upload-Seite war zu breit durch unnützt gesetze Formularbreite
- Fixed: Veralteter Dialog beim Öffnen einer sehr großen Text-Datei
- Quelltext gehörig aufgeräumt und Übersichtlichter gestaltet

### Version 0.84 (04.08.09)
- New: Kopieren von ganzen Ordner inklusive Inhalt für einfaches Sichern von CMS oder der Website
- New: MD5-Checksumme wird berechnet
- New: Loading Icon beim Import von Dateien über URL
- New: Auto-Version Check
- New: Neues Version Check Verfahren eingeführt
- New: Button zum direkten Bug melden
- Fixed: Rechtschreibfehler
- Fixed: Loading Icon im Datei Upload Dialog umpositioniert
- Fixed: Verbesserte Verarbeitung bei nicht lesbaren Dateien
- Fixed: Fehler beim Zuordnen der Datei Icons bei Office Dateien behoben
- Fixed: Hochgeladene Dateien konnten bei einigen nicht bearbeitet werden
- Fixed: Verschiedene PHP und HTML Bugs
- Lizenzänderung: Nun nicht mehr Creative Commons sondern LGPL

### Version 0.83 (21.03.09)
- Überarbeitung des Bearbeiten Dialogs
- Keine Fehlermeldung mehr beim Hochladen leerer Dateiauswahl-Felder
- Rechtschreibfehler verbessert
- Formular Design verbessert
- Tabellen Layout verbessert
- Standard Schriftart geändert
- Support System in Web-File Manager integriert
- Support System Grundüberholt
- Pfad zum Bilder-Ordner kann nun geändert werden (->Extern gehostete Bilder, ...)
- Ordner schnell und einfach mit .htaccess Verzeichnisschutz schützen
- Externen Öffnen von Ordner nun auch möglich falls diese in 2ter Ebene sind

### Version 0.82 (28.02.09)
- Wird man durch Inaktiviät ausgeloggt, gelangt man automtatisch nach einem erneuten einloggen zur letzten Seite
- Meldung beim Löschen einer Datei, falls keine Datei mehr da ist
- Meldung falls beim Erstellen und Hochladen eine Datei mit diesem Namen bereits vorhanden ist
- Anzeige des Zielordners beim Erstellen bzw. Hochladen von Ordnern/Dateien
- Bessere Überprüfung der Usereingaben beim Verschieben, Kopieren und Umbennen von Dateien
- Integration des Online Bildbearbeitungsdienstes Pixlr
- Importieren von Dateien über URL
- Bessere Verarbeitung, falls eine Datei mit dem Selben Dateinamen bereits vorhanden ist beim Hochladen, Importieren, Erstellen und Kopieren
- Selectbox zur Verzeichnis-Auswahl beim Verschieben von Dateien
- Bilder können nun auch verschoben werden
- Verbesserte Werbecode-Block-Einrichtung
- Bug behoben, bei dem man sich nach dem Logout nicht direkt wieder anmelden kann
- Weitere Dateitypen werden erkannt (unter anderem Word, Excel, PowerPoint)

### Version 0.81 (30.12.08)
- Werbebanner wird nur noch im eingeloggten Zustand geblockt
- Feature: Dateien verschieben
- Fehler bei der Update-Suche behoben

### Version 0.8 (26.12.08)
- Web-File Manager ist nun komplett W3C XHTML und CSS Konform
- Footer geändert
- Passwort wird nun verschlüsselt in den Quelltext geschrieben
- Hover Effekt im Datei- und Ordnermenu links
- Die Breite des Datei- und Ordnermenu's links bleibt nun auch bei nur kurzen Dateinamen gleich breit
- Beim Löschen von Bildern wird nun das Bild noch einmal angezeigt
- Nach dem Speichern einer Datei kann man nun zwischen folgenden drei Optionen wählen:
    - Dateiinhalt weiter bearbeiten
    - Datei auf dem Webspace öffnen
    - Normalen "Datei-Bearbeiten-Dialog" öffnen (zum Verschieben, Umbennenen, ...)
- "Loading"-Grafik beim Upload von Dateien hinzufügt
- Falls JavaScript aktiviert ist, reicht es auch wenn man in die Tabellenzelle klickt um etwa in einen Ordner zu wechseln. Früher musste man dazu immer AUF den Link klicken.
- Funktioniert nun auch bei Ohost/Funpic (ohost.de, funpic.de)
- Design erfolgreich in verschiedenen Browsern (IE, Safari, Firefox und weitere auf der Gecko Enginge basierenden Browser, Opera) auf den Betriebssystemen Windows, Mac, Linux und FreeBSD getestet
- Fehlerhafte Bezeichnungen beim Benutzen von Web-File Manager ohne Grafiken behoben
- Fehlerhafter Link zum Bearbeiten bei Audio-Dateien behoben
- Alle wichtigen Elemente mit title-Tag zur Beschreibung der Funktion versehen
- Fehler, der beim Erstellen von Leeren Dateien immer eine weitere Dateiendung angehängt hat behoben
- Möglichkeit, die Werbung der Hoster zu blockieren eingebaut
- Update für die neue Version des Update-Suchen Routine
- Dateiinhalt kann nun auch angesehen werden, falls die Datei nur lesbar ist und nicht auch schreibbar
- Kleine optische Verbesserung des Bearbeitungs-Textfelds
- Prüfung, ob Dateiuploads überhaupt möglich sind, bevor man hochladen kann
- Integration des Kompressionsverfahren GZip und BZip2
- Es wird nun geprüft, ob das Kompressionsverfahren installiert ist, bevor komprimiert wird

### Version 0.79 (30.11.08)
- Neue Standardschriftart
- Link zur Google Groups Support Gruppen von Web-File Manager im "Über" eingefügt
- Verbesserte Überprüfung der Dateiendung
- Anzahl der Icons reduziert

### Version 0.78 (25.11.08)
- Behebung eines Problems, bei dem keine ZIP-Dateien in Unterordner erstellt werden konnten

### Version 0.77 (18.11.08)
- Anzahl der Ordner und Dateien im Browser links und im Ordner bearbeiten Dialog hinzugefügt
- Option zum automatischen ersetzten von Umlauten beim Abspeichern einer Datei
- Verbesserte Bennenung der Verzeichnisse
- Nach dem Speichern einer Datei kann man nun mit einem Klick zurück und weiter bearbeiten

### Version 0.75 (16.11.08)
- Fehler behoben, bei dem nur Dateien im Root-Verzeichnis bearbeitet werden konnten
- Version Check Routine verbessert (Funktioniert nun auch auf Servern, die keine externen Dokumente öffnen können)
- Wird beim Erstellen einer neuen Datei die Dateiendung vergessen, wird automatisch ".txt" angehängt
- Wird beim Kopieren einer Datei die Dateiendung vergessen, wird automatisch die Endung der Ursprungsdatei angehängt
- Option beim Erstellen neuer Dateien, keine Endung automatisch anzuhängen

### Version 0.7 (14.11.08) - 41.2 KB
- Schreibbar und Lesbar Anzeige im Eigenschaften Dialog von Dateien und Ordnern
- Verarbeitung von Nicht lesbaren Ordnern und Dateien verbessert
- Datei muss schreibbar sein, um überhaupt den Inhalt-Bearbeiten Dialog Öffnen zu können
- Verbesserter Login (Nun mit Username)
- Logout verbessert
- Login-Seite erneuert (Style an geschützten Bereich angepasst)
- Rechtschreibfehler verbessert
- Neues Icon zum Umbennen von Dateien und Ordnern
- Automatischer Logout nach 30 Minuten eingeführt

### Version 0.65 (09.11.08)
- PHP Session Login hinzugefügt
- Beim Bearbeiten von Dateien wird nun vorher gewarnt, falls die Datei nicht schreibbar ist
- Suche nach Updates hinzugefügt

### Version 0.6 (31.10.08) - 37 KB
- Funktion zur Erkennung des Dateitypen anhand der Dateiendung eingebaut
- Warnmeldung im "Server-Info"-Dialog, falls Server keine Mime-Type erkennung unterstützt
- Speichern von geänderten Dateien nun möglich
- Es wird nun im GET übergeben, dass eine Funktion per POST abgeschickt wurde
- Durch obere Neuerung kann rechts das Logo angezeigt werden, wenn dort keine andere Funktion ist
- Im "Ordner bearbeiten"-Dialog hat man nun die Wahl zwischen "Ordner öffnen" und "Ordner extern öffnen"
  Ersteres hat den gleichen Effekt, wie wenn man auf den Ordnernamen links klickt. Bei "Ordner extern öffnen" wird der Ordner direkt auf dem Webspace angesteuert und geöffnet
- Erfolgreich getestet bei Xail.net und bplaced.de
- Test bei Ohost/Funpic nicht bestanden, da Sicherheitsoptionen die Ordnerliste blockieren