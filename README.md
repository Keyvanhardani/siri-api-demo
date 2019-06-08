# Siri API Demo

This is a demo showing how to setup a Siri API on your server that can handle custom requests and process them in any way you see fit. This is possible thanks to new features in the Shortcuts app for iOS 13 that allow you to ask for input in the Siri interface, then pass the complete input to your shortcut.

Leveraging the capabilites of the Shortcuts app allows for the creation of a conversational loop with Siri, allowing you to continue providing new input, which is passed to the server, processed, and responded to. As long as the server specifies a new follow-up question, Siri can continue asking for input and processing responses until your workflow is complete.

An accompanying shortcut called "show me a demo" can be downloaded here: [https://www.icloud.com/shortcuts/8fa40b8045254caf8ebf13caa3ec9a71](https://www.icloud.com/shortcuts/8fa40b8045254caf8ebf13caa3ec9a71)

The server code is all heavily commented. Feel free to remove the comments from your production environment while removing the example code if you want. I kind of went overboard with them. QuickTime Player screen recording on OS X Catalina is broken so I am not able to make a demo video.

To set up the initial installation, follow these steps:

1. Copy the `demo` directory to your web server and give it a new name.
2. Install the shortcut linked above on your phone. You can name this shortcut anything you want. The name will be the command you give Siri. By default you will say "Hey Siri, show me a demo" to begin interaction with your server. If you rename it, you should also change the `Name` value in the dictionary near the top of the shortcut (there are comments showing where it is) to match the new name. That is used to re-trigger the shortcut to handle the conversation loop.
3. On the server, open `core/security.php` and change 'YOUR_KEY_HERE' to a very long, random string that no one will guess. This is your API key. Do not share it with anyone.
4. In the Shortcuts app, open your Siri API shortcut and change the `URL` value in the main dictionary to the URL of your endpoint. You can leave off `index.php` in the URL if you want. If you find this causes issues with information being lost from your request, you can add it back.
5. In the same dictionary, open the `Key` value, then change the `Key` value (a second one) inside that to your API key. This is nested this way so no part of your API key is exposed when the shortcut editor is open. Be aware that your API key is saved in the shortcut and you should not share this shortcut with anyone directly from your phone, or they will have access to your API.
6. Test the connection by saying "Hey Siri, show me a demo" (or whatever command you are using, then, when Siri asks for your input, say anything including the word "test" or "example" to see a response. Siri should ask a follow-up question after that, and responding with any of the affirmative answers in the `$affirmative` array (inside `endpoints/followup.php` on the server) should result in a second response. (For reference, these responses are common words like "yeah" and "yes".)

Additional information, including instructions for setting up your own endpoints and phrases to which Siri should respond, can be found in the comments inside the shortcut or in the PHP scripts.

In the `patterns` directory you will find two files showing how to do some interesting things with the API. There are, of course, just two common things you may want to do, and in no way representative of the full capabilities of the software. You can do any complex operations you want on the server and return any data you want to be read by Siri.

# Demo Video
<iframe width="560" height="315" src="https://www.youtube.com/embed/7eALVzzf2YM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

In this demo I ask Siri to fetch data from my web server, which it does, then it asks a follow-up question. For this demo, I set the follow-up question to always follow up by asking my if I wanted to hear the notes again. In your implementation you can set the follow-up to the follow-up to anything you want, so rather than just looping the last response you can get data through conversational input.
