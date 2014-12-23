import time
import sys

start = time.clock()

top_cap = int(sys.argv[1]) if len(sys.argv) > 1 else 100
print 'Running the searcher over %d iterations' % top_cap

for cycle in range(0, top_cap):
    count_found = total_lines = 0
    with open('input.txt', 'r') as fs:
        for line in fs:
            total_lines += 1
            if line.find('abracadabra') > -1:
                count_found += 1

plural = ''
if count_found == 0:
    verb = 'was no'
elif count_found == 1:
    verb = 'was a total of 1'
else:
    verb = 'were a total of %d' % count_found
    plural = 's'

print 'There %s abracadabra %s in the file' % (verb, plural)

print 'There were a total of %d lines to evaluate' % total_lines

end = time.clock()
diff = end - start

print 'The whole process took %f s' % diff
