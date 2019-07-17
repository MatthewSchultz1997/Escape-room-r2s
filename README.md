# Escape-room-r2s
# The Marco Polo mainframe for a roots2stem escape room

#                                                 --Walkthrough for Marco Polo--
# 1. Open http://192.168.1.157/cmdframe/boot.php which runs a boot up sequence I found online, once all the text runs the final statement instructs the user to enter "Marco Polo"
#
# 2. Upon entry, two lists are printed, Online modules- soil processing, rover and liquefaction, and offline modules- atmospheric processing, communications, water cleanup, power production and water processing. These modules update everytime the page is refreshed.  In the backend code, the page is connected to a mysql database, ip address: 192.168.1.186, which has 8 columns, one for each module and when a task is completed, a program updates its respective column with a 1, signalling the module to move to the online section. Following the instructions, enter Help for a list of commands. if the lists aren't as described, go to http://192.168.1.157/cmdframe/Reset.php
#
# 3. The help page is where the user can really figure out where they should be going, along #with each of the 8 modules, they can find:
#  ASCII Decode: shows the ascii code for each letter (uppercase/lowercase) and 0-9, [ space ]
#  Map: Shows a rough layout of where everything is, may contain hints as to where tools are
#  Time: Shows elapsed time and time remaining, when boot is first accessed, the time in UNIX is sent to a time database, whenever time is accessed the time is also sent to the database and the difference becomes the elapsed time, 60 - elapsed time is remaining time.
#
# ***On the Help page, the user can type "Admin" into the command line and a hidden page will show up with the IP addresses and passwords to each module along with the Sabatier Reactor codes and a form to reset each database so they don't have to be manually deleted, reseting will send the user to the boot page***
# Admin codes: 
# atm    | 192.168.1.101 | password1 
# comm   | 192.168.1.102 | password2 
# soilP  | 192.168.1.103 | password3 
# WaterC | 192.168.1.104 | password4 
# Rover  | 192.168.1.105 | password5 
# PwrP   | 192.168.1.106 | password6 
# WaterP | 192.168.1.107 | password7 
# Liq    | 192.168.1.108 | password8 
#
# Sabatier Codes 
# __________________________________ 
Balanced reaction: "-X 4 -Y 1 -Z 2 -W 1" 
Feedrate: "-H2 1 -CO2 2 -H2O 3 -CH4 4" 
