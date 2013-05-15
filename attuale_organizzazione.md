03/05/2013
----------
Dichiaro servizi e parametri in app/config/config.yml dell'applicazione.
Qui vengono passati i seguenti argomenti : [@doctrine.orm.entity_manager, Sg\CategoryBundle\Entity\Category]
- Il primo è l'entity manager di doctrine
- Il secondo è la mia classe che viene data come parametro al costruttore di Bix\Bundle\CategoryBundle\Doctrine\CategoryManager

In questa maniera posso usare il category manager nella mia applicazione