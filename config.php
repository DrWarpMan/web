<?php
/* TeamSpeak query */
const qPort = "9987"; // server query port
const qURL = "https://x.x.x.x:xxxx/byport/" . qPort . "/"; // query api url
const qKey = "xxxxxxxxxxx"; // api key for query
const qBots = [ // list of bots UIDs
    ""
];

/* Voting site */
const voteKey = ""; // vote api key
const voteURL = "https://teamspeak-servers.org/api/?object=servers&element=detail&key=" . voteKey; // vote api url