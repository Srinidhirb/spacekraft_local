require('dotenv').config();

const { EmailClient, KnownEmailSendStatus } = require("@azure/communication-email");

async function sendEmail(recipientAddress, message) {
    const connectionString = process.env.CONNECTION_STRING;
    const senderAddress = process.env.SENDER_ADDRESS;

    const emailClient = new EmailClient(connectionString);

    const emailMessage = {
        senderAddress: senderAddress,
        recipients: {
            to: [{ address: recipientAddress }]
        },
        content: {
            subject: "Password Reset Request",
            html: message
        },
    };

    try {
        const poller = await emailClient.beginSend(emailMessage);

        let timeElapsed = 0;
        while (!poller.isDone()) {
            poller.poll();
            console.log("Email send polling in progress");
            await new Promise(resolve => setTimeout(resolve, 10000)); // Wait for 10 seconds
            timeElapsed += 10;

            if (timeElapsed > 180) { // 18 * 10 seconds = 180 seconds
                throw "Polling timed out.";
            }
        }

        if (poller.getResult().status === KnownEmailSendStatus.Succeeded) {
            console.log(`Successfully sent the email (operation id: ${poller.getResult().id})`);
        } else {
            throw poller.getResult().error;
        }
    } catch (error) {
        console.error("An error occurred:", error);
    }
}

if (process.argv.length < 4) {
    console.log("Usage: node send_email.js <recipient_address> <message>");
    process.exit(1);
}

const recipientAddress = process.argv[2];
const message = process.argv.slice(3).join(" ");
sendEmail(recipientAddress, message);
