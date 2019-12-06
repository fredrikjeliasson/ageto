#!/bin/bash
# My first script 
# Tänk på att denna fil måste ha Unix FL ändelser!

update(){
 sudo apt-get update -y;
 sudo apt-get upgrade -y;
 sudo DEBIAN_FRONTEND=noninteractive apt-get dist-upgrade -y;
}

updateconfigs(){
	sed -i 's/short_open_tag = Off/short_open_tag = On/' /etc/php/7.3/apache2/php.ini
	sed -i 's/allow_url_include = Off/allow_url_include = On/' /etc/php/7.3/apache2/php.ini
	sed -i 's/enable_post_data_reading = Off/enable_post_data_reading = On/' /etc/php/7.3/apache2/php.ini
}


PS3='1 updates and installs dist-upgrade, 2 installs apache and php: '
options=("Option 1" "Option 2" "Option 3" "Quit")
select opt in "${options[@]}"
do
    case $opt in
        "Option 1")
            update;
            ;;
        "Option 2")
            updateconfigs;
            ;;
        "Option 3")
            echo "you chose choice $REPLY which is $opt"
            ;;
        "Quit")
            break
            ;;
        *) echo "invalid option $REPLY";;
    esac
done




updateconfigs;
