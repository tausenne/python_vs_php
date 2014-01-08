import time
import sys

start = time.clock()

top_cap = int(sys.argv[1]) if len(sys.argv) > 1 else 100
print 'Running the searcher over ' + str(top_cap) + ' iterations'

for cycle in range(0, top_cap):
    count_found = total_lines = 0
    with open('input.txt', 'r') as fs:
        for line in fs:
            total_lines += 1
            if line.find('abracadabra') > -1:
                count_found += 1 # there're no ++ and -- operators in python

plural = ''
if count_found == 0:
    verb = 'was no'
elif count_found == 1:
    verb = 'was a total of 1'
else:
    verb = 'were a total of ' + str(count_found)
    plural = 's'

print 'There ' + verb + ' abracadabra' + plural + ' in the file'

print 'There were a total of ' + str(total_lines) + ' lines to evaluate'

end = time.clock()
diff = end - start

print 'The whole process took ' + str(diff) + ' s'
