# simple_mod_node
A simple module for modifying nodes on a schedule.


A simple module for modifying nodes on a schedule. 

Use case: Determining whether a Daily Digests should be sent.
Use case: Originally designed to modify existing content but may be slimmed down to merely automate the creation of a digest
Use case: Scan all comments in the past 24 hours, if there are comments, send a digest. If not, do not send.
Use case: Create Digests via time zone regions. Eastern, Pacific, Tokyo, Sydney, Beijing, and Berlin.
Use case: Run job at 8:30am in each of these regions and if there are comments, then queue messages to go out at 9:00am in those regions.
