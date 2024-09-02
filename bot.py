import os

import telebot

BOT_TOKEN = os.environ.get('7468245761:AAFd4ZaBnV9t1aG0vvO5990BDT3VKixTwjs')

bot = telebot.TeleBot(BOT_TOKEN)

@bot.message_handler(commands=['start', 'hello'])
def send_welcome(message):
    bot.reply_to(message, "Howdy, how are you doing?")