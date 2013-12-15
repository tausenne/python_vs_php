import time
import datetime
import locale
import subprocess
import os

def getsystemlocale():
    lc = subprocess.Popen('locale', stdout=subprocess.PIPE, shell = True)
    (output, err) = lc.communicate()

    output = output.split(os.linesep)
    for line in output:
        temp = line.split('=')
        if temp[0] == 'LC_NUMERIC':
            loc = temp[1].replace('"', '')
            return loc

    return '' # and an empty string if we didn't find anything

locale.setlocale(locale.LC_ALL, getsystemlocale())
def microtime(): # to mimic PHP's microtime(true)
    dt = datetime.datetime.now()
    ret = time.mktime(dt.timetuple()) + dt.microsecond / 100000.0

    return ret

def number_format(num, precision = 0):
    return locale.format('%.*f', (precision, num), True)

start = microtime()
fs = open('input.txt', 'r')
lines = []
count_found = 0
for line in fs:
    lines.append(line)

print 'There are a total of ' + number_format(len(lines)) + ' lines to evaluate'

for line in lines:
    if line.find('abracadabra') > -1:
        count_found += 1 # there're no ++ and -- operators in python

fs.close()

if count_found == 0:
    print 'There was no abracadabra in the file'
else:
    if count_found == 1:
        verb = 'was'
        quote = 'abracadabra'
    else:
        verb = 'were'
        quote = 'abracadabras'

    print 'There ' + verb + ' ' + str(count_found) + ' ' + quote + ' in the file'

end = microtime()
diff = end - start

print 'The whole process took ' + str(diff) + ' s'
