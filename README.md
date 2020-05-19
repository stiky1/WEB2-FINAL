# WEB2-FINAL
Final zadanie - WEB2
Najprv v PHP Storme:
    1. Ctr+Alt+S -> tools -> SSH terminal -> tam zvolit remote na ktorom mate WEBY
    2. Na vrchnej liste -> Tools -> Start SSH Session -> dole by sa mal otvorit terminal pre REMOTE
Ak nepouzivate PHP Storm tak si to najdite ako "show remote terminal" alebo tak dajak

GIT:
    1. v Remote terminaly "cd public_html"
    2. "git clone https://github.com/stiky1/WEB2-FINAL.git"
    3. "git branch 'meno'" , ja mam "juraj" tak si dajte aj vy tak nech o tom nerozmyslam ked bude daco treba :D
            - toto vam vytvori vasu branchu u vas
            - na vytvorenie branchi na git staci ak urobit prvy push
                - git push origin 'meno'
    4. "git config --global user.email 'email_na_gite'"
    5. "git config --global user.name 'username_na_gite'"
    6. "vi ~/.bachrc"
    7. a potom ta dat tento kod
        git_branch() {
          git branch 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/(\1)/'
        }
    8. pod to pridat
        export PS1="\[\e]0;\u@\h: \w\a\]${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\] \[\033[00;32m\]\$(git_branch)\[\033[00m\]\$ "
    9. Esc -> :wq!
    10. po vypnuti vicka 
        "source ~/.bashrc"
        
 
 
PUSH na GIT: vzdy pushujem zo svojej branchi na svoju branchu na gite (meno branchi na gite a u mna nech je rovnake)
    1. "git add ."
    2. "git commit -m 'nejaky koment'"
    3. "git push origin 'nazov mojej branche'"
    4. potom bude najskor chciet 'username' a 'pass'
    5. na gite sa potom automaticky vytvori pull request do mastra ktory treba potvrdit a skontrolovat
       ale to mozem robit ja ked tak

PULL z GITU: pullom si updatnete svoju branchu
    1. som na svojej branchi
        -ak neviem kde som tak "git branch"
        - prepnutie "git checkout 'nazov_branche'"
    2. "git pull origin master"
    