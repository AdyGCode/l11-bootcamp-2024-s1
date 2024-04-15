# Laravel 11 - Bootcamp


## Notifications of Chirps

Two parts:
1) The notification, event creation and dispatching
2) The event listener that processes the events

You will need: MailPit for this part

### Notification
What is sent.

In our case we send an email to all the users, except the user
who wrote the chirp.

### Event
The equivalent to a calendar appointment, but more dynamic.

### Dispatching
How the event (and thus the notification) is sent to the event queue 
for handling by the listener.

### Listener
Listens for events on queues, and calls the required event actions 
to be performed.
