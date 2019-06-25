#Compiled PosPay.py using
#import py_compile
#py_compile.compile(r"C:\Users\amynsberge.COWR\Google Drive\Code\Python\Tools\PosPay.py")
#
#Then renamed from .pyc to .pyw - this gets rid of Python window, too.

#Need to make the pay ("0") show an actual value - and be lower on the list, so larger row# for the grid.

#Need to add wrapper(?) to pop up an error message better

import Tkinter
from Tkinter import *
try:
    from tkinter import *
    from tkinter import ttk
    from tkinter.ttk import *
except:
    from _tkinter import *
    import ttk
    from ttk import *
import csv, os
import tkFileDialog

import csv, os
import tkFileDialog

class Window(Frame):
    def __init__(self, master=None):
        Frame.__init__(self, master)
        self.grid()
        self.filename=""
        self.paytype="0"
        self.outfile=""
        options=['0','2','3']
        #
        labelpay=Label(master, text="Issue (0), Stop Pay (2), or Void (3)",anchor="w")
        self.v=Tkinter.StringVar()
        self.v.set(options[0])
        self.om = Tkinter.OptionMenu(self,self.v,*options,command=self.optionval)#self.v.set)
        labelpay.grid(sticky="E")
        self.om.grid(row=0,column=3,sticky="S")

        #This gets defined when the filename is entered from the button menu
        csvfile=Label(master, text="File (in 'wells fargo' CSV format)")   #was "root"
        csvfile.grid(row=2, column=0)
        self.csventry=Entry(master,text="")
        self.csventry.grid(row=2,column=1)
        #         bar=Entry(master)#was "Master"
        #         bar.grid(row=1, column=1)
        csvOutfile=Label(master, text="Output file (to be saved as .txt format)")
        csvOutfile.grid(row=3, column=0)
        self.csvOutentry=Entry(master,text="")
        self.csvOutentry.grid(row=3,column=1)
        #         bar2=Entry(master)
        #         bar2.grid(row=2, column=1)
        #pay or void?
        #print("Made it this far...")
        #self.dropdown = tkinter.ttk.OptionMenu(bar,value,options[0],*options)
        #
        #Buttons
        self.bbutton= Button(master, text="Browse", command=self.browsecsv)
        self.bbutton.grid(row=2, column=2)
        #
        self.bbutton2= Button(master, text="Browse", command=self.browsecsvOut)
        self.bbutton2.grid(row=3, column=2)
        #self.pack()
        #print("Made it this far too...")
        self.cbutton= Button(master, text="OK", command=self.process_csv)
        self.cbutton.grid(row=6, column=2)
        #
        master.mainloop()
    #
    #
    #
    def optionval(self,value):
        self.paytype=value
    #
    def browsecsv(self):
        #
        #Tk().withdraw()
        self.filename = tkFileDialog.askopenfilename()
        self.csventry.delete(0,END)
        self.csventry.insert(0,self.filename)
    #
    def browsecsvOut(self):
        #
        #Tk().withdraw()
        self.outfile = tkFileDialog.asksaveasfilename()
        if not ".txt" in self.outfile:
            self.outfile=self.outfile+".txt"
        self.outfile = self.outfile.replace(".csv","")
        self.csvOutentry.delete(0,END)
        self.csvOutentry.insert(0,self.outfile)
    #
    #
    #def process_csv(self):
    #    import datetime
    #    print(self.filename)

    def create_window(self,textval=""):
        t = Tkinter.Toplevel(self)
        t.wm_title("ERROR!")
        l = Tkinter.Label(t, text=textval)
        l.pack(side="top", fill="both", expand=True, padx=100, pady=100)

    def process_csv(self):
        import datetime
        if self.filename and self.paytype and self.outfile:
            if self.filename[-3:] <> 'csv':
                os.rename(self.filename,self.filename+".csv")
                self.filename=self.filename+".csv"
            with open(self.filename, 'rb') as csvfile:
                with open(self.outfile,'wb') as out:
                    csvdata = csv.reader(csvfile,delimiter = ',',quotechar='"')
                    rownum=0
                    for row in csvdata:
                        rownum+=1
                        try:
                            dateinfo=datetime.datetime.strptime(row[3],"%m-%d-%Y")
                            out.write("".join(["{:0>8}".format(row[4].split(".")[0]),
                                        "{:<2}".format(row[4].split(".")[1]),
                                        "{:0>2}".format(str(dateinfo.month)),
                                        "{:0>2}".format(str(dateinfo.day)),
                                        "{:0>4}".format(str(dateinfo.year)),
                                  "{:0>12}".format(row[2]),
                                  "{:0>15}".format(row[1]),
                                  "{:0>10}".format(str(rownum)),
                                  "{:0<20}".format(row[6][:20]),
                                  str(self.paytype),#"0",
                                  "   ","\n"]))
                        except:
                            self.create_window(textval="Error, problem with input values - incomplete or empty output file.")
                            #tkMessageBox.showerror("Error","Problem with input values - incomplete or empty output file.")
                            print("Error in input values?  Incomplete output")
                            break
        else:
            self.create_window(textval="Error, problem with input values - incomplete or empty output file.")
            Tkinter.ttk.tkMessageBox.showerror("Error","Problem with input values - incomplete or empty output file.")
            print("Error in input values?  Incomplete output")
            print("Oops!")
            try:
                print(self.filename)
            except:
                pass
            try:
                print(self.paytype)
            except:
                pass
            try:
                print(self.outfile)
            except:
                pass
        self.master.destroy()

root = Tkinter.Tk()
root.title("Create positive pay file for Wood Trust")
window=Window(master=root)
#window.mainloop()



# #Need to add wrapper(?) to pop up an error message better
#
# from Tkinter import *
# import csv, os
#
# class Window:
#     def __init__(self, master):
#         self.filename=""
#         self.paytype=""
#         self.outfile=""
#         #This gets defined when the filename is entered from the button menu
#         csvfile=Label(root, text="File (in 'wells fargo' format from ACS)").grid(row=1, column=0)
#         csvOutfile=Label(root, text="Output file").grid(row=2, column=0)
#         bar=Entry(master).grid(row=1, column=1)
#         bar2=Entry(master).grid(row=2, column=1)
#         #pay or void?
#
#         options=['0','2','3']
#
#         self.v=Tkinter.StringVar()
#         self.v.set(options[0])
#         self.om = Tkinter.OptionMenu(self,self.v,*options,command=self.optionval)
#         self.om.grid(row=8,column=1)
#         #self.dropdown = tkinter.ttk.OptionMenu(bar,value,options[0],*options)
#
#         #Buttons
#         y=7
#         self.cbutton= Button(root, text="OK", command=self.process_csv)
#         y+=1
#         self.cbutton.grid(row=10, column=3, sticky = W + E)
#         self.bbutton= Button(root, text="Browse", command=self.browsecsv)
#         self.bbutton.grid(row=1, column=3)
#
#         self.bbutton2= Button(root, text="Browse", command=self.browsecsvOut)
#         self.bbutton2.grid(row=2, column=3)
#
#
#     def optionval(self,value):
#         self.paytype=value
#
#     def browsecsv(self):
#         import tkFileDialog
#
#         #Tk().withdraw()
#         self.filename = tkFileDialog.askopenfilename()
#
#     def browsecsvOut(self):
#         import tkFileDialog
#
#         #Tk().withdraw()
#         self.outfile = tkFileDialog.asksaveasfilename()
#
#
#     def process_csv(self):
#         import datetime
#         if self.filename and self.paytype and self.outfile:
#             if self.filename[-3:] <> 'csv':
#                 os.rename(self.filename,self.filename+".csv")
#                 self.filename=self.filename+".csv"
#             with open(self.filename, 'rb') as csvfile:
#                 with open(self.outfile,'wb') as out:
#                     csvdata = csv.reader(csvfile,delimiter = ',',quotechar='"')
#                     rownum=0
#                     for row in csvdata:
#                         rownum+=1
#                         try:
#                             dateinfo=datetime.datetime.strptime(row[3],"%m-%d-%Y")
#                             out.write("".join(["{:0>8}".format(row[4].split(".")[0]),
#                                         "{:<2}".format(row[4].split(".")[1]),
#                                         "{:0>2}".format(str(dateinfo.month)),
#                                         "{:0>2}".format(str(dateinfo.day)),
#                                         "{:0>4}".format(str(dateinfo.year)),
#                                   "{:0>12}".format(row[2]),
#                                   "{:0>15}".format(row[1]),
#                                   "{:0>10}".format(str(rownum)),
#                                   "{:0<20}".format(row[6][:20]),
#                                   str(self.paytype),#"0",
#                                   "   ","\n"]))
#                         except:
#                             tkMessageBox.showerror("Error","Problem with input values - incomplete or empty output file.")
#                             print("Error in input values?  Incomplete output")
#                             break
# #                     logreader = csv.reader(csvfile, delimiter=',', quotechar='|')
# #                     rownum=0
# #                     for row in logreader:
# #                         NumColumns = len(row)
# #                         rownum += 1
# #
# #                     Matrix = [["" for x in xrange(NumColumns)] for x in xrange(rownum)]
#
#     root = Tkinter.Tk()
#     window=Window(root)
#     root.mainloop()

# class App:
#     def __init__(self,master): #master = parent widget; adds child widgets
#
#         frame = Frame(master)
#         frame.pack() #immediately make frame visible
#
#         #self.Label(root, text="Hello, world!")
#
#         self.button = Button(
#             frame, text="QUIT", fg="red", command=frame.quit
#             )
#         self.button.pack(side=LEFT)
#
#         self.hi_there = Button(frame, text="Hello", command=self.say_hi)
#         self.hi_there.pack(side=LEFT)
#
#     def say_hi(self):
#         print "hi there, everyone!"
#
# root = Tk()
#
# app = App(root)
#
# root.mainloop()
# root.destroy() # optional; see description below
