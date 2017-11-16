# separation of concerns
brief Single Responsibility Principle explained with Controller, Repository, Service class

## Introduction

When I implement controller class, I often face a problem that too much code is in a method in controller class. For instance, I usually need to retrieve data from model in order to send the data to view. If multiple models are required, the method gets so messy. Additionally, there are duplicated codes in the similar methods.

To confront this problem, to create Repository and Service class. Although I'm still struggling when to use Service layer, I found tips from [Java Spring framework documentation](https://docs.spring.io/spring-roo/reference/html/architecture.html#architecture-services). I concluded that when I deal with multiple models (including transaction) or separate business logic, Service layer would be useful. 

## Example 

In my project, I need to implement CRUD operation of multiple models (Dictionary, Word, and User models) on my controller class; hence, I decide to implement Repository and Service class as following:

![alt text](./Repo_Ser_Diagram.png?raw=true)


